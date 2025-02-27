<div class="fixed top-4 right-4 z-50" id="modal">
    <div class="bg-red-500 shadow-lg rounded-lg p-4 flex gap-5">
        <div class="flex justify-between items-center">
            <button class="hover:text-gray-500" id="close">&times;</button>
        </div>
        <p class="">{{ $slot }}</p>
    </div>
</div>

<script>
    const modal = document.getElementById("modal");
    const closeModal = document.getElementById("close");

    closeModal.onclick = function () {
        modal.classList.add("hidden");
    }

    window.onclick = function (event) {
        if (event.target === modal) {
            modal.classList.add("hidden");
        }
    }

</script>