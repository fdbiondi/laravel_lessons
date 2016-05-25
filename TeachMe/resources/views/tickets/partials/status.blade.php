<span {!! Html::classes(['label label-info absolute', 'highlight' => $ticket->status == 'open']) !!}>
    {{ trans('tickets.status.' . $ticket->status) }}
</span>