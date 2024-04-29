Using adminui widgets for jForms
================================

The adminui module provides widgets for jForms, so your forms will be well
integrated into the adminLTE theme.

You should indicate the `adminlte` builder to jForms.

For all forms, you must indicate into the configuration

```ini
[tplplugins]
defaultJformsBuilder=adminlte
```

Or if you want to use the builder only for specific forms, in your templates, you should indicate 
the `adminlte` jforms builder into the `{form}` tag and similaire jtpl tags.

Examples: 

```html
<div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">A sample form</h3>
        </div>

        {form $form, 'test~default:formsave', array(), 'adminlte'}
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
```

```html

<div class="box">
    <div class="box-header">
        <h3>A sample form</h3>
    </div>
    <div class="box-body">

        {formfull $form, 'test~default:formsave', array(), 'adminlte'}

    </div>
</div>

```


```html

<div class="box">
    <div class="box-header">
        <h3>Form data</h3>
    </div>
    <div class="box-body">

        {formdatafull $form, 'adminlte'}

    </div>
</div>


```

