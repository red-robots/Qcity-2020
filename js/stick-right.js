import { useState } from '@wordpress/element';
var el = wp.element.createElement;
var __ = wp.i18n.__;
var registerPlugin = wp.plugins.registerPlugin;
var PluginPostStatusInfo = wp.editPost.PluginPostStatusInfo;
var CheckboxControl = wp.components.CheckboxControl;

function MyPostStatusInfoPlugin({}) {    
    //const [ isChecked, setChecked ] = useState( true );
    return el(
        PluginPostStatusInfo,
        {
            className: 'my-post-status-info'
        },
        el(
            CheckboxControl,
            {
                name: 'qcity_custom_stick_right',
                label: __( 'Stick On Right Side' ), 
                value: "1",
                //checked: { checked }
                onChange: { setChecked }           
            }
        )
    );
}

function setChecked( val )
{
    console.log('Checkbox checked!');
}

registerPlugin( 'my-post-status-info-plugin', {
    render: MyPostStatusInfoPlugin
} );