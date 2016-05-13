<span {!! Html::classes(['label label-info absolute', 'highlight' => $ticket->status == 'open']) !!}>
    {{ $ticket->status }}
</span>