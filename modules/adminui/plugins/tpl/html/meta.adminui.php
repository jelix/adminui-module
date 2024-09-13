<?php
/**
* @author    Raphaël MARTIN
* @copyright 2024 3liz.com
*
* @see      3liz.com
*
* Inspired by jelix meta_html plugin that allow to define values in template
* that will be used in the response object
* very usefull when you want to overwite values defined by an external module
* simply by overriding template
*/

/**
 * Method jtpl_meta_html_adminui
 *
 * @param jTpl   $tpl           template engine
 * @param string $metaAttribute the item you want to change id response (possible value :
 *                              page_title, sub_page_title, page_title_locale, sub_page_title_locale)
 * @param mixed  $param         value for the item (exemple : the title for item "page_title")
 * @param array  $params        additional parameters
 *
 * @return void
 */
function jtpl_meta_html_adminui($tpl, $metaAttribute, $param = null, $params = array())
{
    $resp = jApp::coord()->response;

    if ($resp->getType() != 'html') {
        return;
    }
    switch ($metaAttribute) {
        case 'page_title': case 'sub_page_title':
            $resp->body->assign($metaAttribute, $param);

            break;
        case 'page_title_locale': case 'sub_page_title_locale':
            try {
                $localisedValue = jLocale::get($param, $params);
                $tplVarName = substr($metaAttribute, 0, -7);
                $resp->body->assign($tplVarName, $localisedValue);
            } catch (\Exception $e) {
                // log exception
                \jLog::logEx($e, 'error');
            }
    }

}
