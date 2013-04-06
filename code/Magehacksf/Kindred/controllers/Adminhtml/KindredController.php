<?php
class Magehacksf_Kindred_Adminhtml_KindredController extends Mage_Adminhtml_Controller_Action
{

    // todo PERMISSIONS?!
    /**
     * Public actions for this controller
     */
    protected $_publicActions = array();

    /**
     * Who is allowed to use these?
     *
     * todo ACL
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return true;
    }

    /**
     * Index Action
     *
     * Renders the inital gridview for the navexport database.
     */
    public function indexAction()
    {
        echo "hello!";
    }

}
