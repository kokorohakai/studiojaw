<h1>Ember.js</h1><br><br>
Ember JS is a mvc framework for javascript. It supports many types of elements and manages binding between them and your data for you. It takes care of a lot of boilerplate code that you would normally
spend days coding. Below is a very simple example of how ember.js works, click <a href="/t/js/Ember">here</a> to see the code below in action. Click <a href="/t/js/Ember/EmberTutorial.zip">here</a>
to download the example.
<?
$sf = new simpleframe( true );
$sf -> top();

$source = file_get_contents("t/js/01-1.txt");
$geshi = new GeSHi($source,"php");
echo $geshi->parse_code();

$sf -> bottom();
?>