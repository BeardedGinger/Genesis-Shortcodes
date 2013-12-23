Genesis-Shortcodes
==================

Adds a button to your WYSIWYG that allows you to add default Genesis shortcodes as well as custom shortcodes built from default Genesis column classes. 

Requires the [Genesis Framework from StudioPress](http://joshmallard.com/genesis-link)

Usage
==================

Genesis Defaults
----------------

The default Genesis shortcodes will output into the editor with all of their possible attributes except for the `before` and `after `. These are available on the majority of the default shortcodes. More information can be found  [here from StudioPress](http://my.studiopress.com/docs/shortcode-reference/).

Column Classes
--------------

Column classes are output using the `[genesis_column][/genesis_column]` shortcode and the class is set by defining the appropriate size. Additionally, the first column in a row will require the addition of a position attribute which looks like this `position="first"`.

**Example**
Shortcodes used to display a two-column layout both columns being half width. 

`[genesis_column size="one-half" position="first"]`
Sample Content
`[/genesis_column]`
`[genesis_column size="one-half"]`
Sample Content
`[/genesis_column]`

