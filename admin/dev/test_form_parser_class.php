<?php
// $Id: test_form_parser_class.php,v 1.1 2007/11/02 11:36:29 ohwada Exp $

//=========================================================
// WebLinks Module
// 2007-10-30 K.OHWADA
//=========================================================

//=========================================================
// class weblinks_test_form_parser
//=========================================================
class weblinks_test_form_parser
{
    public $_DEBUG = false;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        // dummy
    }

    //---------------------------------------------------------
    // function
    //---------------------------------------------------------
    public function &parse($text)
    {
        $parser = new HtmlParser($text);

        $arr            = [];
        $form_loop      = false;
        $select_loop    = false;
        $textarea_loop  = false;
        $select_name    = null;
        $select_value   = null;
        $textarea_name  = null;
        $textarea_value = null;

        while ($parser->parse()) {
            if ($this->_DEBUG) {
                echo "<br><br>\n";
                echo 'Name=' . $parser->iNodeName . ';';
                echo 'Type=' . $parser->iNodeType . ';';
            }

            $node_name  = mb_strtolower($parser->iNodeName);
            $form_begin = false;
            if ('form' == $node_name) {
                if ('1' == $parser->iNodeType) {
                    $form_begin = true;
                    $form_loop  = true;
                } elseif ('2' == $parser->iNodeType) {
                    $form_loop = false;
                }
            }

            if (!$form_loop) {
                continue;
            }

            if ('select' == $node_name) {
                if ('1' == $parser->iNodeType) {
                    $select_loop  = true;
                    $select_name  = null;
                    $select_value = null;
                } elseif ('2' == $parser->iNodeType) {
                    $select_loop = false;
                    if ('cid[]' == $select_name) {
                        $arr['cid_arr'][] = $select_value;
                    } elseif ($select_name) {
                        $arr[$select_name] = $select_value;
                    }
                }
            } elseif ('textarea' == $node_name) {
                if ('1' == $parser->iNodeType) {
                    $textarea_loop  = true;
                    $textarea_name  = null;
                    $textarea_value = null;
                } elseif ('2' == $parser->iNodeType) {
                    $textarea_loop = false;
                    if ($textarea_name) {
                        $arr[$textarea_name] = $textarea_value;
                    }
                }
            }

            if (NODE_TYPE_TEXT == $parser->iNodeType) {
                if ($this->_DEBUG) {
                    echo "Value='" . $parser->iNodeValue . "'";
                }

                if ($textarea_loop) {
                    $textarea_value = $parser->iNodeValue;
                }
            } elseif (NODE_TYPE_ELEMENT == $parser->iNodeType) {
                if ($this->_DEBUG) {
                    echo 'ATTRIBUTES: ';
                }

                $attrValues = $parser->iNodeAttributes;
                $attrNames  = array_keys($attrValues);
                $size       = count($attrNames);

                $action   = null;
                $type     = null;
                $name     = null;
                $value    = null;
                $selected = false;
                $checked  = false;

                for ($i = 0; $i < $size; ++$i) {
                    $attr_name  = $attrNames[$i];
                    $attr_value = $attrValues[$attr_name];

                    if ($this->_DEBUG) {
                        echo $attr_name . '="' . $attr_value . '" ';
                    }

                    switch ($attr_name) {
                        case 'name':
                            $name = $attr_value;
                            break;
                        case 'value':
                            $value = $attr_value;
                            break;
                        case 'type':
                            $type = $attr_value;
                            break;
                        case 'selected':
                            $selected = true;
                            break;
                        case 'checked':
                            $checked = true;
                            break;
                        case 'action':
                            $action = $attr_value;
                            break;
                    }

                    if ($select_loop) {
                        if ($name) {
                            $select_name = $name;
                        }
                        if ($selected) {
                            $select_value = $value;
                        }
                    } elseif ($textarea_loop) {
                        if ($name) {
                            $textarea_name = $name;
                        }
                    } elseif ($form_begin) {
                        $arr['action'] = $action;
                    } elseif ('radio' == $type) {
                        if ($checked) {
                            $arr[$name] = $value;
                        }
                    } elseif ('checkbox' == $type) {
                        if ($checked) {
                            $arr[$name] = $value;
                        }
                    } elseif ($name && (null != $value)) {
                        $arr[$name] = $value;
                    }
                }
            }
        }

        return $arr;
    }

    // --- class end ---
}
