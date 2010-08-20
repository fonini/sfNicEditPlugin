<?php

/**
 * sfWidgetFormTextareaNicEdit represents a NicEdit widget.
 *
 * You must include the NicEdit JavaScript file by yourself.
 *
 * @package    symfony
 * @subpackage widget
 * @author     Jonnas Fonini <contato@fonini.net>
 */
class sfWidgetFormTextareaNicEdit extends sfWidgetFormTextarea
{
  /**
   * Constructor.
   *
   * Available options:
   *
   *  * maxHeight: Height value in pixels that the editor should not expand automatically past
   *  * externalCSS: Relative path to an external style sheet to apply to iframe nicEditor instances
   *  * fullPanel: If set to true, the editor instance will be created with all available buttons
   *
   * @param array $options     An array of options
   * @param array $attributes  An array of default HTML attributes
   *
   * @see sfWidgetForm
   */
  protected function configure($options = array(), $attributes = array())
  {
    $this->addOption('maxHeight');   
    $this->addOption('externalCSS');
    $this->addOption('fullPanel');
  }

  /**
   * @param  string $name        The element name
   * @param  string $value       The value selected in this widget
   * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
   * @param  array  $errors      An array of errors for the field
   *
   * @return string An HTML tag string
   *
   * @see sfWidgetForm
   */
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $textarea = parent::render($name, $value, $attributes, $errors);

    $js = sprintf(<<<EOF
<script type="text/javascript">
bkLib.onDomLoaded(function() {
	new nicEditor(
		{iconsPath: '/sfNicEditPlugin/js/nicEditorIcons.gif',
		%s
		%s
        %s
	}).panelInstance('%s');
});
</script>
EOF
    ,
      $this->getOption('maxHeight') ? sprintf('	maxHeight: %,', $this->getOption('maxHeight')) : '',
      $this->getOption('externalCSS') ? sprintf('	externalCSS: "%",', $this->getOption('externalCSS')) : '',
      $this->getOption('fullPanel') ? sprintf('	fullPanel: %s,', $this->getOption('fullPanel')) : '', 
      $this->generateId($name)
    );

    return $textarea.$js;
  }

  /**
   * Gets the JavaScript paths associated with the widget.
   *
   * @return array An array of JavaScript paths
   */
  public function getJavascripts()
  {
    return array('/sfNicEditPlugin/js/nicEdit.js');
  }
}
