function showLoadingMessage() {
    const loadingMessage = document.getElementById('loadingMessage');
    loadingMessage.style.display = 'flex';
    setTimeout(() => {
        loadingMessage.style.display = 'none';
    }, 5000); // Message will disappear after 5 seconds
}