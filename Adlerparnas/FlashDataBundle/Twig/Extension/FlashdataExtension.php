<?php
namespace Adlerparnas\FlashDataBundle\Twig\Extension;


/**
 *
 * @author Adler Parnas <eu@adlerparnas.com>
 * @version 0.1.0
 * @copyright Adler Parnas 12/5/12 2:19 PM
 */
class FlashdataExtension extends \Twig_Extension
{
    protected $flashdata_service;

    public function __construct(\Adlerparnas\FlashDataBundle\Service\FlashDataService $flashdata_service)
    {
        $this->flashdata_service = $flashdata_service;
    }

    public function getFunctions()
    {
        return array(
            'flashdata_messages' => new \Twig_Function_Method($this, 'getFlashdataMessages')
        );
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    function getName()
    {
        return "flashdata_messages";
    }

    public function getFlashdataMessages($clean = true)
    {
        $messages = $this->flashdata_service->getMessages($clean);
        return $messages;
    }
}
