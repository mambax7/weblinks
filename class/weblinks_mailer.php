<?php
// $Id: weblinks_mailer.php,v 1.7 2007/07/21 12:59:37 ohwada Exp $

// 2007-07-16 K.OHWADA
// XC 2.1
// $_errors, $_success

// 2006-05-15 K.OHWADA
// small change

// 2006-01-01 K.OHWADA
// weblinks ver 1.0
// module depulication

//=========================================================
// WebLinks Module
// class weblinks_mailer
// 2005-01-20 K.OHWADA
//=========================================================

//---------------------------------------------------------
// TODO
// global $xoopsConfig, $xoopsModule;
// global $myts;
// get_dir_mail_template() same as sendmail
//---------------------------------------------------------

// === class begin ===
if (!class_exists('weblinks_mailer')) {
    //=========================================================
    // class weblinks_mailer
    //=========================================================
    class weblinks_mailer extends happy_linux_error
    {
        // class
        public $_mailer;

        // content
        public $_subject;
        public $_body;
        public $_header;

        public $_to_users = [];
        public $_success = [];

        // debug
        public $_flag_send;
        public $_flag_debug;

        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct()
        {
            parent::__construct();

            $this->_mailer = &getMailer();

            $this->set_flag_send(false);
            $this->set_debug(true);
        }

        public static function getInstance()
        {
            static $instance;
            if (null === $instance) {
                $instance = new static();
            }

            return $instance;
        }

        //---------------------------------------------------------
        // function same as XoopsMailer
        //---------------------------------------------------------
        public function setFromName($value)
        {
            $this->_mailer->setFromName($value);
        }

        public function setFromEmail($value)
        {
            $this->_mailer->setFromEmail($value);
        }

        public function setSubject($value)
        {
            $this->_mailer->setSubject($value);
        }

        public function setBody($value)
        {
            $this->_mailer->setBody($value);
        }

        public function useMail()
        {
            $this->_mailer->useMail();
        }

        public function setToEmails($email)
        {
            $this->_mailer->setToEmails($email);
        }

        public function send($debug = false)
        {
            $ret = $this->_mailer->send($debug);

            return $ret;
        }

        public function get_mailer_success($ashtml = true)
        {
            $ret = $this->_mailer->getSuccess($ashtml);

            return $ret;
        }

        public function get_mailer_errors($ashtml = true)
        {
            $ret = $this->_mailer->getErrors($ashtml);

            return $ret;
        }

        //---------------------------------------------------------
        // function
        //---------------------------------------------------------
        public function prepare()
        {
            $debug = $this->_flag_debug;

            global $xoopsConfig;

            if ('' == $this->_mailer->body && '' == $this->_mailer->template) {
                if ($debug) {
                    $this->_set_errors(_MAIL_MSGBODY);
                }

                return false;
            } elseif ('' != $this->_mailer->template) {
                $path = ('' != $this->_mailer->templatedir) ? $this->_mailer->templatedir . '' . $this->_mailer->template : (XOOPS_ROOT_PATH . '/language/' . $xoopsConfig['language'] . '/mail_template/' . $this->_mailer->template);

                if (!($fd = @fopen($path, 'rb'))) {
                    if ($debug) {
                        $this->_set_errors(_MAIL_FAILOPTPL);
                    }

                    return false;
                }

                $this->_mailer->setBody(fread($fd, filesize($path)));
            }

            // for sending mail only
            if (!empty($this->_mailer->priority)) {
                $this->_mailer->headers[] = 'X-Priority: ' . $this->_mailer->priority;
            }

            $this->_mailer->headers[] = 'X-Mailer: PHP/' . phpversion();
            $this->_mailer->headers[] = 'Return-Path: ' . $this->_mailer->fromEmail;
            $header = implode($this->_mailer->LE, $this->_mailer->headers);

            // TODO: we should have an option of no-reply for private messages and emails
            // to which we do not accept replies.  e.g. the site admin doesn't want a
            // a lot of message from people trying to unsubscribe.  Just make sure to
            // give good instructions in the message.

            // add some standard tags (user-dependent tags are included later)
            global $xoopsConfig;
            $this->_mailer->assign('X_ADMINMAIL', $xoopsConfig['adminmail']);
            $this->_mailer->assign('X_SITENAME', $xoopsConfig['sitename']);
            $this->_mailer->assign('X_SITEURL', XOOPS_URL);

            // TODO: also X_ADMINNAME??
            // TODO: X_SIGNATURE, X_DISCLAIMER ?? - these are probably best
            //  done as includes if mail templates ever get this sophisticated

            // replace tags with actual values
            $body = $this->_mailer->body;
            $subject = $this->_mailer->subject;

            foreach ($this->_mailer->assignedTags as $k => $v) {
                $body = str_replace('{' . $k . '}', $v, $body);
                $subject = str_replace('{' . $k . '}', $v, $subject);
            }

            $body = str_replace("\r\n", "\n", $body);
            $body = str_replace("\r", "\n", $body);
            $body = str_replace("\n", $this->_mailer->LE, $body);

            $this->_subject = $subject;
            $this->_body = $body;
            $this->_header = $header;

            if (!$this->_flag_send) {
                echo nl2br($this->_sanitize($header)) . " <br><br>\n";
            }
        }

        public function set_to_users($user)
        {
            if (is_array($user)) {
                $this->_to_users[] = $user;
            }
        }

        public function send_users($debug = false)
        {
            $flag_error = false;

            if (is_array($this->_to_users) && count($this->_to_users)) {
                foreach ($this->_to_users as $user) {
                    $ret = $this->send_user($user, $debug);
                    if (!$ret) {
                        $flag_error = true;
                    }
                }
            }

            if ($flag_error) {
                return false;
            }

            return true;
        }

        public function send_user($user, $debug = false)
        {
            $flag_error = false;

            $this->_mailer->errors = [];
            $this->_mailer->success = [];

            $lid = $user['lid'];
            $email = $user['email'];
            $name = $user['name'];

            // send message to specified users, if any

            // NOTE: we don't send to LIST of recipients, because the tags
            // below are dependent on the user identity; i.e. each user
            // receives (potentially) a different message

            // set some user specific variables
            $subject = str_replace('{W_NAME}', $name, $this->_subject);

            $body = str_replace('{W_LID}', $lid, $this->_body);
            $body = str_replace('{W_EMAIL}', $email, $body);
            $body = str_replace('{W_NAME}', $name, $body);

            $msg_to = $this->_sanitize($name) . ' <' . $this->_sanitize($email) . '> ';

            // send mail
            if ($this->_flag_send) {
                if (!$this->_mailer->sendMail($email, $subject, $body, $this->_header)) {
                    if ($debug) {
                        $flag_error = true;
                        $this->_set_errors(sprintf(_MAIL_SENDMAILNG, $msg_to));

                        $msg = $this->_mailer->getErrors(false);
                        if ($msg) {
                            $this->_set_errors($msg);
                        }
                    }
                } else {
                    if ($debug) {
                        $this->_set_log(sprintf(_MAIL_MAILGOOD, $msg_to));

                        $msg = $this->_mailer->getSuccess(false);
                        if ($msg) {
                            $this->_set_log($msg);
                        }
                    }
                }
            } else {
                echo "<b>$lid</b>: ";
                echo $this->_sanitize($name) . ', ';
                echo $this->_sanitize($email) . ', ';
                echo $this->_sanitize($subject) . " <br>\n";
                echo nl2br($this->_sanitize($body)) . " <br><br>\n";
            }

            if ($flag_error) {
                return false;
            }

            return true;
        }

        public function set_flag_send($value)
        {
            $this->_flag_send = (bool)$value;
        }

        public function set_debug($value)
        {
            $this->_flag_debug = (bool)$value;
        }

        //-------------------------------------------------------------------
        // get_dir_mail_template
        // REQ 3028: send apoval email to anonymous user
        // move from submit_form.php
        //-------------------------------------------------------------------
        public function get_dir_mail_template($file_tpl)
        {
            global $xoopsConfig, $xoopsModule;

            $MODULE_ROOT = XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->dirname();

            $dir_tpl_lang = $MODULE_ROOT . '/language/' . $xoopsConfig['language'] . '/mail_template/';

            if (file_exists($dir_tpl_lang . $file_tpl)) {
                return $dir_tpl_lang;
            }
            $dir = $MODULE_ROOT . '/language/english/mail_template/';

            return $dir;
        }

        // --- class end ---
    }
    // === class end ===
}
