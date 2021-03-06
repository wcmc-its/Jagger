<?php

echo '
<ul class="tabs" id="attrpolstab" data-tab role="tablist">
<li class="tab-title active" role="presentational"><a href="#introtab" role="tab" tabindex="0" aria-selected="true" controls="introtab">' . lang('tabinformation') . '</a></li>
  <li class="tab-title" role="presentational" data-reveal-ajax-tab="' . base_url('manage/attributepolicy/getsupported/' . $idpid . '') . '"><a href="#attrpol-1" role="tab" tabindex="0" aria-selected="false" controls="attrpol-1">' . lang('rr_attributes') . '/' . lang('defaultpolicytab') . '</a></li>
  <li class="tab-title" role="presentational" data-reveal-ajax-tab="' . base_url('manage/attributepolicy/getfedattrs/' . $idpid . '') . '"><a href="#attrpol-2" role="tab" tabindex="0"aria-selected="false" controls="attrpol-2">' . lang('fedspolicytab') . '</a></li>
  <li class="tab-title" role="presentational" data-reveal-ajax-tab="' . base_url('manage/attributepolicy/getentcatattrs/' . $idpid . '') . '"><a href="#attrpol-3" role="tab" tabindex="0" aria-selected="false" controls="attrpol-3">' . lang('ecpolicytab') . '</a></li>
  <li class="tab-title" role="presentational" data-reveal-ajax-tab="' . base_url('manage/attributepolicy/getspecattrs/' . $idpid . '') . '"><a href="#attrpol-4" role="tab" tabindex="0" aria-selected="false" controls="attrpol-4">' . lang('sppolicytab') . '</a></li>
</ul>
';


echo '<div id="attrpols" class="tabs-content" data-jagger-providerdetails="' . base_url('providers/detail/show/') . '">
        <section role="tabpanel" aria-hidden="false" class="content active" id="introtab">
            INFORMATION GUIDE SOON!

<ul>
            <li>Default Attribute Release Policy - it does not include rules based on Entity Categories: <br />
            <small>'.base_url('arp/format2/'.$encodedentity.'/arp.xml').'</small> <a href="'.base_url('arp/format2/'.$encodedentity.'/arp.xml').'"><i class="fi-link"></i></a>
</li>
<li>Experimental Attribute Release Policy for ShibbolethIDP ver 2.x - it does include rules based on Entity Categories: <br />
            <small>'.base_url('arp/format2exp/'.$encodedentity.'/arp.xml').'</small> <a href="'.base_url('arp/format2exp/'.$encodedentity.'/arp.xml').'"><i class="fi-link"></i></a>
            </li>

<li>Experimental Attribute Release Policy for ShibbolethIDP ver 3.x - it does include rules based on Entity Categories: <br />
            <small>'.base_url('arp/format3exp/'.$encodedentity.'/arp.xml').'</small> <a href="'.base_url('arp/format3exp/'.$encodedentity.'/arp.xml').'"><i class="fi-link"></i></a>
            </li>
            </ul>
        </section>
        <section role="tabpanel" aria-hidden="true" class="content" id="attrpol-1">
        </section>
        <section role="tabpanel" aria-hidden="true" class="content" id="attrpol-2">
        </section>
        <section role="tabpanel" aria-hidden="true" class="content" id="attrpol-3">
        </section>
        <section role="tabpanel" aria-hidden="true" class="content" id="attrpol-4">
        </section>
    </div>';


/////////MODALS


echo '<div id="arpmdelattr" class="reveal-modal medium" data-reveal>
    <h4>' . lang('delattrsconfirm') . '</h4>
    <p>
    <div>' . lang('rrattr') . ': <span class="attributename"></span></div>
    </p>
    <div class="response"></div>';

$hidden = array('attrid' => '', 'idpid' => '');
echo form_open(base_url('manage/attributepolicy/delattr/' . $idpid . ''), null, $hidden);
$buttons = array(
    '<button type="reset" name="cancel" value="cancel" class="button alert modal-close">' . lang('rr_cancel') . '</button>',
    '<div class="yes button">' . lang('btn_deleteall') . '</div>'
);
echo revealBtnsRow($buttons);
echo form_close();
?>

</div>

<?php
echo '<div id="arpmeditglobalattr" class="reveal-modal medium" data-reveal>
    <h4>' . lang('updatedefaultpol') . '</h4>
    <p><div>' . lang('rrattr') . ': <span class="attributename"></span></div></p>
    <div class="response"></div>';
$hidden = array('attrid' => '', 'idpid' => '');
echo form_open(base_url('manage/attributepolicy/updateattrglobal/' . $idpid . ''), null, $hidden);
echo '<div class="row">';
echo '<div class="small-5 medium-3 column"><label class="text-right">' . lang('attrsupported') . '</lable></div>';
echo '<div class="small-7 medium-9 column">';
echo '<div class="switch small"><input id="CheckboxSwitch" type="checkbox" name="support" value="enabled"><label for="CheckboxSwitch"></label></div>';
echo '</div>';
echo '</div>';
echo '<div class="row">';
echo '<div class="medium-3 column medium-text-right"><label>' . lang('policy') . '</label></div>';
echo '<div class="medium-9 column">' . form_dropdown('policy', array('0' => lang('dropnever'), '1' => lang('dropokreq'), '2' => lang('dropokreqdes'), '100' => lang('dropnotset'))) . '</div>';
echo '</div>';


$buttons = array(
    '<button type="reset" name="cancel" value="cancel" class="button alert modal-close">' . lang('rr_cancel') . '</button>',
    '<div class="yes button">' . lang('btnupdate') . '</div>'
);
echo revealBtnsRow($buttons);
echo form_close();
?>
    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>
<?php
echo '<div  id="addattrsupport" class="small-12 column hidden" data-jagger-link="' . base_url('manage/attributepolicy/getsupported/' . $idpid . '') . '"><button class="small right">' . lang('btnaddattr') . '</button></div>';
echo '<div  id="addentcatattr" class="small-12 column hidden" data-jagger-link="' . base_url('manage/attributepolicy/getentcats/' . $idpid . '') . '"><button class="small right">' . lang('addnpol') . '</button></div>';
echo '<div  id="addespecattr" class="small-12 column hidden" data-jagger-link="' . base_url('manage/attributepolicy/getspecsp/' . $idpid . '') . '"><button class="small right">' . lang('addnpol') . '</button></div>';
///////////////////////
$nhidden = array('support' => 'enabled');

echo '<div id="arpmaddattr" class="reveal-modal medium" data-reveal>';
echo form_open(base_url('manage/attributepolicy/updateattrglobal/' . $idpid . ''), null, $nhidden);
echo '<div class="row">';
echo '<div class="medium-3 column"><label class="text-right">' . lang('rrattr') . '</label></div>';
$attrdropdown = array();
foreach ($attrdefs as $k => $v) {
    if (!in_array($k, $arpsupport)) {
        $attrdropdown[$k] = $v;
    }
}
echo '<div class="medium-9 column">' . form_dropdown('attrid', $attrdefs) . '</div>';
echo '</div>';
echo '<div class="row">';
echo '<div class="medium-3 column medium-text-right"><label>' . lang('policy') . '</label></div>';
echo '<div class="medium-9 column">' . form_dropdown('policy', array('0' => lang('dropnever'), '1' => lang('dropokreq'), '2' => lang('dropokreqdes'))) . '</div>';
echo '</div>';

$buttons = array(
    '<button type="reset" name="cancel" value="cancel" class="button alert modal-close">' . lang('rr_cancel') . '</button>',
    '<div class="yes button">' . lang('rr_add') . '</div>'
);
echo revealBtnsRow($buttons);
echo form_close();
?>
<a class="close-reveal-modal" aria-label="Close">&#215;</a>
<?php
echo '</div>';
////////////////

echo '<div id="arpmeditfedattr" class="reveal-modal medium" data-reveal>
    <h4>' . lang('updatefedpol') . '</h4>
    <p><div>' . lang('rrattr') . ': <span class="attributename"></span></div></p>
    <div class="response"></div>';

$hidden = array('attrid' => '', 'fedid' => '');
echo form_open(base_url('manage/attributepolicy/updateattrfed/' . $idpid . ''), null, $hidden);
echo '<div class="row">';
echo '<div class="medium-3 column medium-text-right"><label>' . lang('policy') . '</label></div>';
echo '<div class="medium-9 column">' . form_dropdown('policy', array('0' => lang('dropnever'), '1' => lang('dropokreq'), '2' => lang('dropokreqdes'), '100' => lang('dropnotset'))) . '</div>';
echo '</div>';
$buttons = array(
    '<button type="reset" name="cancel" value="cancel" class="button alert modal-close">' . lang('rr_cancel') . '</button>',
    '<div class="yes button">' . lang('btnupdate') . '</div>'
);
echo revealBtnsRow($buttons);
echo form_close();
echo '<a class="close-reveal-modal" aria-label="Close">&#215;</a></div>';
////////////////////////////////////////////////////////////////////////////

echo '<div id="arpmeditentcatattr" class="reveal-modal medium" data-reveal>
    <h4>' . lang('updateecpol') . '</h4>
    <p><div>'.lang('rrattr').': <span class="attributename"></span></div></p>
    <div class="response"></div>';
$hidden = array('attrid' => '', 'entcatid' => '');
echo form_open(base_url('manage/attributepolicy/updateattrentcat/' . $idpid . ''), null, $hidden);
echo '<div class="row">';
echo '<div class="medium-3 column medium-text-right"><label>' . lang('policy') . '</label></div>';
echo '<div class="medium-9 column">' . form_dropdown('policy', array('0' => lang('dropnever'), '1' => lang('dropokreq'), '2' => lang('dropokreqdes'), '100' => lang('dropnotset'))) . '</div>';
echo '</div>';
$buttons = array(
    '<button type="reset" name="cancel" value="cancel" class="button alert modal-close">' . lang('rr_cancel') . '</button>',
    '<div class="yes button">' . lang('btnupdate') . '</div>'
);
echo revealBtnsRow($buttons).
    form_close().
    '<a class="close-reveal-modal" aria-label="Close">&#215;</a></div>';





echo '<div id="arpmeditspattr" class="reveal-modal medium" data-reveal data-jagger-getdata="' . base_url('manage/attributepolicy/getspecforedit/' . $idpid . '') . '">';
echo '<h4>'.lang('updatesppol').'</h4>
<p>
<div>'.lang('rrattr').': <span class="attributename"></span></div>
<div>'.lang('rr_requester').': <span class="requestersp"></span></div>
</p>
<div class="response"></div>';

$hidden = array('attrid' => '', 'spid' => '');

echo form_open(base_url('manage/attributepolicy/updateattrsp/' . $idpid . ''), null, $hidden);
echo '<div class="row">';
echo '<div class="medium-3 column medium-text-right"><label>' . lang('policy') . '</label></div>';
echo '<div class="medium-9 column">' . form_dropdown('policy', array('0' => lang('dropnever'), '1' => lang('dropokreq'), '2' => lang('dropokreqdes'), '100' => lang('dropnotset'))) . '</div>';
echo '</div>';

echo '<div class="row">';
echo '<div class="medium-3 column medium-text-right"><label>' . lang('customenabled') . '</label></div>';
echo '<div class="medium-9 column"><input name="customenabled" type="checkbox" value="yes"/></div>';
echo '</div>';

echo '<div class="row">';
echo '<div class="medium-3 column medium-text-right"><label>'.lang('custompolicy').'</label></div>';
echo '<div class="medium-9 column"><select name="custompolicy"><option value="permit">'.lang('rr_permvalues').'</option><option value="deny">'.lang('rr_denvalues').'</option></select></div>';
echo '</div>';
echo '<div class="row">';
echo '<div class="medium-3 column medium-text-right"><label>'.lang('rr_valuessplitbycomma').'</label></div>';
echo '<div class="medium-9 column"><textarea name="customvals"></textarea></div>';
echo '</div>';


$buttons = array(
    '<button type="reset" name="cancel" value="cancel" class="button alert modal-close">' . lang('rr_cancel') . '</button>',
    '<div class="yes button">' . lang('btnupdate') . '</div>'
);
echo revealBtnsRow($buttons);
echo form_close();

echo '<a class="close-reveal-modal" aria-label="Close">&#215;</a></div>';


echo '<div id="arpmaddentcatattr" class="reveal-modal medium" data-reveal>
    <h4>'.lang('addecpol').'</h4>
    <div class="response"></div>';
echo form_open(base_url('manage/attributepolicy/addattrentcat/' . $idpid . ''));
echo '<div class="row">';
echo '<div class="medium-3 column medium-text-right"><label>' . lang('rrattr') . '</label></div>';
echo '<div class="medium-9 column">' . form_dropdown('attrid', array()) . '</div>';
echo '</div>';
echo '<div class="row">';
echo '<div class="medium-3 column medium-text-right"><label>'.lang('entcat').'</label></div>';
echo '<div class="medium-9 column">' . form_dropdown('entcatid', array()) . '</div>';
echo '</div>';
echo '<div class="row">';
echo '<div class="medium-3 column medium-text-right"><label>' . lang('policy') . '</label></div>';
echo '<div class="medium-9 column">' . form_dropdown('policy', array('0' => lang('dropnever'), '1' => lang('dropokreq'), '2' => lang('dropokreqdes'), '100' => lang('dropnotset'))) . '</div>';
echo '</div>';
$buttons = array(
    '<button type="reset" name="cancel" value="cancel" class="button alert modal-close">' . lang('rr_cancel') . '</button>',
    '<div class="yes button">' . lang('btnupdate') . '</div>'
);
echo revealBtnsRow($buttons). form_close(). '</div>';




echo '<div id="arpmaddspecattr" class="reveal-modal medium" data-reveal>
    <h4>'.lang('addsppol').'</h4>
    <div class="response"></div>';

echo form_open(base_url('manage/attributepolicy/addattrspec/' . $idpid . ''));
echo '<div class="row">';
echo '<div class="medium-3 column medium-text-right"><label>' . lang('rrattr') . '</label></div>';
echo '<div class="medium-9 column">' . form_dropdown('attrid', array()) . '</div>';
echo '</div>';
echo '<div class="row">';
echo '<div class="medium-3 column medium-text-right"><label>' . lang('serviceprovider') . '</label></div>';
echo '<div class="medium-9 column">' . form_dropdown('spid', array()) . '</div>';
echo '</div>';
echo '<div class="row">';
echo '<div class="medium-3 column medium-text-right"><label>' . lang('policy') . '</label></div>';
echo '<div class="medium-9 column">' . form_dropdown('policy', array('0' => lang('dropnever'), '1' => lang('dropokreq'), '2' => lang('dropokreqdes'), '100' => lang('dropnotset'))) . '</div>';
echo '</div>';

echo '<div class="row">';
echo '<div class="medium-3 column medium-text-right"><label>' . lang('customenabled') . '</label></div>';
echo '<div class="medium-9 column"><input name="customenabled" type="checkbox" value="yes"/></div>';
echo '</div>';

echo '<div class="row">';
echo '<div class="medium-3 column medium-text-right"><label>'.lang('custompolicy').'</label></div>';
echo '<div class="medium-9 column"><select name="custompolicy"><option value="permit">'.lang('rr_permvalues').'</option><option value="deny">'.lang('rr_denvalues').'</option></select></div>';
echo '</div>';
echo '<div class="row">';
echo '<div class="medium-3 column medium-text-right"><label>'.lang('rr_valuessplitbycomma').'</label></div>';
echo '<div class="medium-9 column"><textarea name="customvals"></textarea></div>';
echo '</div>';

$buttons = array(
    '<button type="reset" name="cancel" value="cancel" class="button alert modal-close">' . lang('rr_cancel') . '</button>',
    '<div class="yes button">' . lang('btnupdate') . '</div>'
);
echo revealBtnsRow($buttons);
echo form_close();
?>
    <a class="close-reveal-modal" aria-label="Close">&#215;</a>

</div>
<?php
echo '<div id="ecmembers" class="reveal-modal small" data-reveal>';
echo '<h4>' . lang('modtl_listentconec') . '</h4>';
echo '<div class="datacontent"></div>';
echo '<a class="close-reveal-modal">&#215;</a>';
echo '</div>';
