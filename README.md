Symfony-FlashdataBundle
=======================

A Flashdata Message Bundle

This Bundle is a Flashdata message system, more easy to use that Symfony2 Flashdata.

# Installation

  - Copy Adlerparnas folder to your src folder
  - Add the bundle class in your AppKernel:registerBundles array


# How To Use

To add messages in your flashdata bag, you need to get the "flashdata" service and call the method "addMessage""

[code language="PHP"]

use \Adlerparnas\FlashdataBundle\Entity\Message as FlashdataMessage;

$this->get('flashdata')->addMessage("Hello Word", FlashdataMessage::INFO );

[/code]


To get your messages on view you only need to call flashdata_messages() function:


[code language="HTML"]
  <ul>
  {% for messages in flashdata_messages() %}
    {# loop.index is message type #}
    {% for message in message %}
      <li class="{{message.message_type}}">{{message.message}}</li>
    {% endfor %}
  {% endfor %}
  </ul>
[/code]

By default flashdata_message Twig function clear the flashdata bag, but you can pass FALSE 
as argument and flashdata bag will not be cleared.

The flashdata_messages return looks like this:

array(
  'info' => array( //info messages )
  'success' => array( //success messages )
)

The messages are stored in session, so you can redirec the user without lost your messages.


# To-do

  - Add Test cases
  - Add a function to print the messages from a view


For any questions or sugestion talk to me by email.

Adler Parnas <eu@adleparnas.com>



