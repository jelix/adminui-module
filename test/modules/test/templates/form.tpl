{meta_html title 'Form example' }
{meta_adminui page_title 'A form'}
{meta_adminui sub_page_title 'Show all jForms widgets for AdminLte'}

{if $customform}
    <p>Custom form template. <a href="{jurl 'test~default:form'}">Switch to automatic form template</a>.</p>
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">A sample form</h3>
        </div>

        {form $form, 'test~default:formsave', array(), 'adminlte', array(
        'plugins' => array(
            'autocompletetown' => 'autocomplete_adminlte' ,
            'pwd_widgetpasswordeditor' => 'passwordeditor_adminlte',
            'pwd_widgetpassword' => 'password_adminlte'
          ))}
            <div class="card-body">

                {formcontrols}
                <div class="form-group">
                    {ctrl_label}
                    {ctrl_control}
                </div>
                {/formcontrols}


            </div>

            <div class="card-footer">
                {formsubmit} {formreset}
            </div>
        {/form}
    </div>
{else}
    <p>Automatic form template. <a href="{jurl 'test~default:form', array('custom'=>1)}">Switch to custom form template</a>.</p>

<div class="box">
    <div class="box-header">
        <h3>A sample form</h3>
    </div>
    <div class="box-body">

        {formfull $form, 'test~default:formsave', array(), 'adminlte', array(
        'plugins' => array( 'autocompletetown' => 'autocomplete_adminlte') )}

    </div>
</div>
{/if}
