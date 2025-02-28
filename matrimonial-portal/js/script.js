// Profile Form Submission
document.getElementById('profile-form').addEventListener('submit', function (e) {
    e.preventDefault();
    alert('Profile updated successfully!');
});

// Search Form Submission
document.getElementById('search-form').addEventListener('submit', function (e) {
    e.preventDefault();
    const age = document.getElementById('age').value;
    const location = document.getElementById('location').value;
    const maritalStatus = document.getElementById('marital_status').value;

    // Simulate search results
    const results = [
        { name: 'John Doe', age: 35, location: 'Delhi', maritalStatus: 'Divorced' },
        { name: 'Jane Smith', age: 32, location: 'Mumbai', maritalStatus: 'Divorced' }
    ];

    const resultsHTML = results.map(user => `
        <div class="user">
            <h3>${user.name}</h3>
            <p>Age: ${user.age}, Location: ${user.location}, Marital Status: ${user.maritalStatus}</p>
        </div>
    `).join('');

    document.getElementById('search-results').innerHTML = resultsHTML;
});