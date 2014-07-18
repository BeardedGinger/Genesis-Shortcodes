(function() {
	tinymce.PluginManager.add('genesis_shortcodes', function( editor, url ) {
		editor.addButton('genesis_shortcodes', {
			icon: 'genesis-shortcode-generator',
			type: 'menubutton',
			menu: [
				{
					text: 'Genesis Default Shortcodes',
					menu: [
						{
							text: 'Post Date',
							onclick: function() {
								editor.insertContent('[post_date format="F j, Y" label="Date: "]');
							}
						},
						{
							text: 'Post Time',
							onclick: function() {
								editor.insertContent('[post_time format="g:i a" label="Posted at: "]');
							}
						},
						{
							text: 'Post Author',
							onclick: function() {
								editor.insertContent('[post_author]');
							}
						},
						{
							text: 'Post Author Link',
							onclick: function() {
								editor.insertContent('[post_author_link nofollow="false"]');
							}
						},
						{
							text: 'Post Author Posts Link',
							onclick: function() {
								editor.insertContent('[post_author_posts_link]');
							}
						},
						{
							text: 'Post Comments',
							onclick: function() {
								editor.insertContent('[post_comments zero="Leave a Comment" one="1 Comment" more="% Comments"]');
							}
						},
						{
							text: 'Post Tags',
							onclick: function() {
								editor.insertContent('[post_tags sep=" | "]');
							}
						},
						{
							text: 'Post Categories',
							onclick: function() {
								editor.insertContent('[post_categories sep=" | "]');
							}
						},
						{
							text: 'Post Terms',
							onclick: function() {
								editor.insertContent('[post_terms sep=" | " taxonomy=""]');
							}
						}
					]
				},
				{
					text: 'Accordion',
					menu: [
						{
							text: 'Accordion Wrapper',
							onclick: function() {
								editor.insertContent('[gb_accordion_wrapper]Add Accordion Sections here[/gb_accordion_wrapper]');
							}
						},
						{
							text: 'Accordion Section',
							onclick: function() {
								editor.insertContent('[gb_accordion_section title="Accordion Section"]Accordion Content[/gb_accordion_section]');
							}
						}
					]
				},
				{
					text: 'Columns',
					menu: [
						{
							text: 'One Half First',
							onclick: function() {
								editor.insertContent('[genesis_column size="one-half" position="first"]Sample Content[/genesis_column]');
							}
						},
						{
							text: 'One Half',
							onclick: function() {
								editor.insertContent('[genesis_column size="one-half"]Sample Content[/genesis_column]');
							}
						},
						{
							text: 'One Third First',
							onclick: function() {
								editor.insertContent('[genesis_column size="one-third" position="first"]Sample Content[/genesis_column]');
							}
						},
						{
							text: 'One Third',
							onclick: function() {
								editor.insertContent('[genesis_column size="one-third"]Sample Content[/genesis_column]');
							}
						},
						{
							text: 'One Fourth First',
							onclick: function() {
								editor.insertContent('[genesis_column size="one-fourth" position="first"]Sample Content[/genesis_column]');
							}
						},
						{
							text: 'One Fourth',
							onclick: function() {
								editor.insertContent('[genesis_column size="one-fourth"]Sample Content[/genesis_column]');
							}
						},
						{
							text: 'One Sixth First',
							onclick: function() {
								editor.insertContent('[genesis_column size="one-sixth" position="first"]Sample Content[/genesis_column]');
							}
						},
						{
							text: 'One Sixth',
							onclick: function() {
								editor.insertContent('[genesis_column size="one-sixth"]Sample Content[/genesis_column]');
							}
						},
						{
							text: 'Two Thirds',
							onclick: function() {
								editor.insertContent('[genesis_column size="two-thirds"]Sample Content[/genesis_column]');
							}
						},
						{
							text: 'Three Fourths',
							onclick: function() {
								editor.insertContent('[genesis_column size="three-fourths"]Sample Content[/genesis_column]');
							}
						},
						{
							text: 'Five Sixths',
							onclick: function() {
								editor.insertContent('[genesis_column size="five-sixths"]Sample Content[/genesis_column]');
							}
						},
					]
				},
				{
					text: 'Clear',
					onclick: function() {
						editor.insertContent('[clear]');
					}
				},
				{
					text: 'Toggle',
					onclick: function() {
						editor.insertContent('[gb_toggle title="Toggle Title" wrapper="h4"]Content to be toggled[/gb_toggle]');
					}
				},
				{
					text: 'Documentation / Help',
					onclick: function() {
						window.open ('http://joshmallard.com', 'blank');
					}
				},
			]
		});
	});
}) ();