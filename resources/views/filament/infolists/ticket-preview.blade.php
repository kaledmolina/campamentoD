<div class="w-full flex justify-center bg-zinc-950 rounded-xl overflow-hidden shadow-lg border border-gold-500/20">
    <iframe src="{{ \Illuminate\Support\Facades\URL::signedRoute('ticket.show', ['user' => $getRecord()]) }}"
        class="w-full h-[600px] border-0" title="Ticket Preview">
    </iframe>
</div>