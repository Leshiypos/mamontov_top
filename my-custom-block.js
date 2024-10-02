wp.blocks.registerBlockType( 'hello-elementor/my-custom-block', {
    title: 'My Custom Block',
    icon: 'universal-access-alt',
    category: 'layout',
    attributes: {
        content: {
            type: 'string',
            default: 'Hello World!'
        },
    },

    edit: function( props ) {
        return wp.element.createElement(
            wp.components.TextareaControl,
            {
                value: props.attributes.content,
                onChange: function( newContent ) {
                    props.setAttributes( { content: newContent } );
                },
            }
        );
    },

    save: function() {
        return null; // Содержимое обрабатывается PHP.
    }
} );