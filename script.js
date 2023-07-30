// Function to display notices on the page
function displayNotices(noticesData) {
    const noticesList = document.getElementById('noticesList');

    // Clear existing notices
    noticesList.innerHTML = '';

    // Loop through the noticesData and create list items for each notice
    noticesData.forEach(notice => {
        const listItem = document.createElement('li');
        listItem.innerHTML = `
                <h3>${notice.title}</h3>
                <p>Date: ${notice.date}</p>
                <p>${notice.content}</p>
            `;
        noticesList.appendChild(listItem);
    });
}

// Fetch notices from the server
fetch('http://localhost:9000/notices') // Use the correct URL to access the notices endpoint on your server
    .then(response => response.json())
    .then(noticesData => {
        // Call the displayNotices function to show notices on the page
        displayNotices(noticesData);
    })
    .catch(error => {
        console.error('Error fetching notices:', error);
    });