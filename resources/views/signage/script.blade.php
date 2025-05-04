<script>
    function toggleIframe(signId) {
        const iframe = document.getElementById('signageIframe-' + signId);
        const button = document.getElementById('toggleIframeBtn-' + signId);

        const showUrl = "{{ route('signage.show', ':id') }}".replace(':id', signId);
        const editUrl = "{{ route('signage.edit', ':id') }}".replace(':id', signId);

        if (iframe.src === editUrl || iframe.src.includes('/edit')) {
            iframe.src = showUrl;
            button.innerHTML = '<i class="bi bi-pencil-square"></i> ';
        } else {
            iframe.src = editUrl;
            button.innerHTML = '<i class="bi bi-info-circle"></i> ';
        }
    }
</script>
