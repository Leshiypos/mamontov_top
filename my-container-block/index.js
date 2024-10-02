import { registerBlockType } from '@wordpress/blocks';
import { InnerBlocks } from '@wordpress/block-editor';

registerBlockType('mamontov/my-container-block', {
    apiVersion: 2,
    edit: () => {
        return (
            <div>
                <InnerBlocks />
            </div>
        );
    },
    save: () => {
        return (
            <div>
                <InnerBlocks.Content />
            </div>
        );
    },
});
