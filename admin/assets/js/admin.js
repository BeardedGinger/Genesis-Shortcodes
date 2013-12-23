(function ( $ ) {
	"use strict";

	$(function () {

		tinymce.create('tinymce.plugins.GenesisShortcodeMce', {
		init : function(ed, url){
			tinymce.plugins.GenesisShortcodeMce.theurl = url;
		},
		createControl : function(btn, e) {
			if ( btn == "genesis_shortcodes_button" ) {
				var a = this;	
				var btn = e.createSplitButton('genesis_button', {
	                title: "Insert Shortcode",
					image: tinymce.plugins.GenesisShortcodeMce.theurl +"/icon.png",
					icons: false,
	            });

	            btn.onRenderMenu.add(function (c, b) {
					
					b.add({title : 'Genesis Shortcodes', 'class' : 'mceMenuItemTitle'}).setDisabled(1);
					
					
					// Genesis Defaults
					c = b.addMenu({title:"Genesis Default Shortcodes"});
					
						c.add({title : 'Post Shortcodes', 'class' : 'mceMenuItemTitle'}).setDisabled(1);
							
							a.render( c, "Post Date", "postdate" );
							a.render( c, "Post Time", "posttime" );
							a.render( c, "Post Author", "postauthor" );
							a.render( c, "Post Author Link", "postauthorlink" );
							a.render( c, "Post Author Posts Link", "postauthorpostslink" );
							a.render( c, "Post Comments", "postcomments" );
							a.render( c, "Post Tags", "posttags" );
							a.render( c, "Post Categories", "postcategories" );
							a.render( c, "Post Terms", "postterms" );
							
						
					// Columns
					c = b.addMenu({title:"Columns"});
						
						a.render( c, "One Half", "half" );
						a.render( c, "One Third", "third" );
						a.render( c, "One Fourth", "fourth" );
						a.render( c, "One Sixth", "sixth" )
						
						c.addSeparator();		
								
						a.render( c, "Two Thirds", "twothird" );
						a.render( c, "Three Fourths", "threefourth" );
						a.render( c, "Three Fifths", "threefifth" );
						a.render( c, "Fourth Fifths", "fourfifth" );
						a.render( c, "Five Sixths", "fivesixth" );
					
					b.addSeparator();						
					
				});
	            
	          return btn;
			}
			return null;               
		},
		render : function(ed, title, id) {
			ed.add({
				title: title,
				onclick: function () {
					
					// Selected content
					var mceSelected = tinyMCE.activeEditor.selection.getContent();
					
					// Genesis Defaults
					if(id == "postdate") {
						tinyMCE.activeEditor.selection.setContent('[post_date format="F j, Y" label="Date: "]');
					}
					if(id == "posttime") {
						tinyMCE.activeEditor.selection.setContent('[post_time format="g:i a" label="Posted at: "]');
					}
					if(id == "postauthor") {
						tinyMCE.activeEditor.selection.setContent('[post_author]');
					}
					if(id == "postauthorlink") {
						tinyMCE.activeEditor.selection.setContent('[post_author_link nofollow="false"]');
					}
					if(id == "postauthorpostslink") {
						tinyMCE.activeEditor.selection.setContent('[post_author_posts_link]');
					}
					if(id == "postcomments") {
						tinyMCE.activeEditor.selection.setContent('[post_comments zero="Leave a Comment" one="1 Comment" more="% Comments"]');
					}
					if(id == "posttags") {
						tinyMCE.activeEditor.selection.setContent('[post_tags sep=" | "]');
					}
					if(id == "postcategories") {
						tinyMCE.activeEditor.selection.setContent('[post_categories sep=" | "]');
					}
					if(id == "postterms") {
						tinyMCE.activeEditor.selection.setContent('[post_terms sep=" | " taxonomy=""]');
					}
					
					// Columns
					if(id == "half") {
						tinyMCE.activeEditor.selection.setContent('[genesis_column size="one-half" position="first"]Sample Content[/genesis_column]');
					}
					if(id == "third") {
						tinyMCE.activeEditor.selection.setContent('[genesis_column size="one-third" position="first"]Sample Content[/genesis_column]');
					}
					if(id == "fourth") {
						tinyMCE.activeEditor.selection.setContent('[genesis_column size="one-fourth" position="first"]Sample Content[/genesis_column]');
					}
					if(id == "sixth") {
						tinyMCE.activeEditor.selection.setContent('[genesis_column size="one-sixth" position="first"]Sample Content[/genesis_column]');
					}
					if(id == "twothird") {
						tinyMCE.activeEditor.selection.setContent('[genesis_column size="two-thirds"]Sample Content[/genesis_column]');
					}
					if(id == "threefourth") {
						tinyMCE.activeEditor.selection.setContent('[genesis_column size="three-fourths"]Sample Content[/genesis_column]');
					}
					if(id == "threefifth") {
						tinyMCE.activeEditor.selection.setContent('[genesis_column size="three-fifths"]Sample Content[/genesis_column]');
					}
					if(id == "fourfifth") {
						tinyMCE.activeEditor.selection.setContent('[genesis_column size="four-fifths"]Sample Content[/genesis_column]');
					}
					if(id == "fivesixth") {
						tinyMCE.activeEditor.selection.setContent('[genesis_column size="five-sixths"]Sample Content[/genesis_column]');
					}	
					return false;
				}
			})
		}
	
	});
	tinymce.PluginManager.add("genesis_shortcodes", tinymce.plugins.GenesisShortcodeMce);

	});

}(jQuery));