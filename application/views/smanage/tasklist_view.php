
<?php


echo '<div class="row"><div class="small-12 column right"><div class="right"><a class="button small" href="'.base_url('smanage/taskscheduler/taskedit').'">'.lang('rr_add').'</a></div></div></div>';
$this->table->set_heading('cron',lang('rr_description'),lang('rrworkerfn'),lang('rrworkerfnparams'),'isdue',lang('rrlastrun'),lang('rrnextrun'),lang('rr_status'),'');

if(isset($rows))
{
    echo $this->table->generate($rows);
}
