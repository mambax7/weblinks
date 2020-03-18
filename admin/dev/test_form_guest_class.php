<?php

// $Id: test_form_guest_class.php,v 1.1 2011/12/29 14:32:58 ohwada Exp $

// 2007-10-30 K.OHWADA
// divid from test_form_class.php
// change request from int to text

//=========================================================
// WebLinks Module
// 2006-09-20 K.OHWADA
//=========================================================

//=========================================================
// class weblinks_test_form_guest
//=========================================================

/**
 * Class weblinks_test_form_guest
 */
class weblinks_test_form_guest extends weblinks_test_form
{
    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return \happy_linux_basic_handler|\weblinks_dev_handler|\weblinks_gen_record|\weblinks_test_form|\weblinks_test_form_guest|static
     */
    public static function getInstance($dirname = null)
    {
        static $instance;
        if (null === $instance) {
            $instance = new static($dirname);
        }

        return $instance;
    }

    //---------------------------------------------------------
    // guest modify
    //---------------------------------------------------------

    /**
     * @param $param
     * @return bool
     */
    public function guest_modify_password(&$param)
    {
        $lid = isset($param['lid']) ? $param['lid'] : 0;

        $this->_lid = $lid;

        $link_form_url = $this->_user_modify_url . '?lid=' . $lid;
        $ret = $this->fetch_form($link_form_url);
        if (!$ret) {
            return false;
        }

        $form = $this->build_form_password($param);

        $ret = $this->submit_form($this->_user_modify_url, $form);
        if (!$ret) {
            return false;
        }

        $form = $this->build_link_form($param);

        $ret = $this->submit_form($this->_user_modify_url, $form);
        if (!$ret) {
            return false;
        }

        return true;
    }

    //---------------------------------------------------------
    // guest delete
    //---------------------------------------------------------

    /**
     * @param $param
     * @return bool
     */
    public function guest_delete_password($param)
    {
        $lid = isset($param['lid']) ? $param['lid'] : 0;

        $this->_lid = $lid;

        $link_form_url = $this->_user_modify_url . '?lid=' . $lid;
        $ret = $this->fetch_form($link_form_url);
        if (!$ret) {
            return false;
        }

        $form = $this->build_form_password($param);

        $ret = $this->submit_form($this->_user_modify_url, $form);
        if (!$ret) {
            return false;
        }

        // post op=delete
        $form = $this->build_form_del_password($param);

        $ret = $this->submit_form($this->_user_modify_url, $form);
        if (!$ret) {
            return false;
        }

        return true;
    }

    //---------------------------------------------------------
    // build_link_form
    //---------------------------------------------------------

    /**
     * @param $param
     * @return array
     */
    public function &build_form_password($param)
    {
        $lid = isset($param['lid']) ? $param['lid'] : 0;
        $passwd = isset($param['passwd']) ? $param['passwd'] : null;
        $request = isset($param['request']) ? $param['request'] : null;

        $arr = [
            'lid' => $lid,
            'passwd_old' => $passwd,
            'request' => $request,
        ];

        return $arr;
    }

    /**
     * @param $param
     * @return array
     */
    public function &build_form_del_password($param)
    {
        $lid = isset($param['lid']) ? $param['lid'] : 0;
        $passwd = isset($param['passwd']) ? $param['passwd'] : null;
        $request = isset($param['request']) ? $param['request'] : null;

        $arr = [
            'XOOPS_G_TICKET' => $this->get_ticket(),
            'delete' => 'delete',
            'lid' => $lid,
            'passwd_old' => $passwd,
            'request' => $request,
            'notify' => 0,
        ];

        return $arr;
    }

    //---------------------------------------------------------
    // permission
    //---------------------------------------------------------

    /**
     * @return bool
     */
    public function has_guest_perm()
    {
        global $xoopsModule;
        $mid = $xoopsModule->getVar('mid');

        $groups_guest = [XOOPS_GROUP_ANONYMOUS];

        $groupperm_handler = xoops_getHandler('groupperm');
        if ($groupperm_handler->checkRight('module_read', $mid, $groups_guest)) {
            return true;
        }

        return false;
    }

    // --- class end ---
}
