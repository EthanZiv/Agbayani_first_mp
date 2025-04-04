document.getElementById('toggleButton').addEventListener('click', function() {
    var dropdown = document.getElementById('dropdown');
    // Use getComputedStyle to ensure correct style handling
    if (dropdown.style.display === '' || dropdown.style.display === 'none') {
        dropdown.style.display = 'block';
    } else {
        dropdown.style.display = 'none';
    }
});
