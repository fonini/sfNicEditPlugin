# sfNicEdit plugin #

The `sfNicEditPlugin` is a symfony plugin that provides a WYSWYG text editor for your forms, using [NicEdit](http://www.nicedit.com).


## Installation ##

### Install the plugin (via a package)

`symfony plugin:install sfNicEditPlugin`

### Install the plugin (via a Git clone)

`git clone git://github.com/fonini/sfNicEditPlugin.git`

### Activate the plugin in `config/ProjectConfiguration.class.php`

````php
class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins(array(
      'sfDoctrinePlugin',
      'sfNicEditPlugin',
      '...'
    ));
  }
}
````

### Publish the plugin assets

`symfony plugin:publish-assets`

### Clear your cache

`symfony cc`

## Using the widget ##

Edit the form class when you'll use the widget. e.g: lib/form/doctrine/NewsForm.class.php
    
````php
public function configure()
{
  $this->setWidget('text', new sfWidgetFormTextareaNicEdit(array('fullPanel' => true), array('cols' => 100, 'rows' => 20)));
}
````

## Questions, bugs, feature requests? ##

Send an e-mail to: jonnasfonini@gmail.com
