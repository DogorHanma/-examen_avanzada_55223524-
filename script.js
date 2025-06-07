document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search');
    const searchButton = document.getElementById('searchButton');
    const commentsList = document.getElementById('comments-list');

   
    const fetchComments = async () => {
        try {
            const response = await fetch('https://jsonplaceholder.typicode.com/comments');
            const comments = await response.json();
            displayComments(comments);
        } catch (error) {
            console.error('Error fetching comments:', error);
        }
    };

   
    const displayComments = (comments) => {
        commentsList.innerHTML = ''; 
        comments.forEach(comment => {
            const commentElement = document.createElement('div');
            commentElement.classList.add('comment');
            commentElement.innerHTML = `
                <h3>${comment.name}</h3>
                <p class="email">Email: ${comment.email}</p>
                <p>${comment.body}</p>
            `;
            commentsList.appendChild(commentElement);
        });
    };

 
    const filterComments = (comments, query) => {
        return comments.filter(comment => comment.email.toLowerCase().includes(query.toLowerCase()));
    };

    
    searchButton.addEventListener('click', function() {
        const query = searchInput.value;
        const filteredComments = filterComments(allComments, query);
        displayComments(filteredComments);
    });

    let allComments = []; 

    
    fetchComments().then(comments => {
        allComments = comments; 
        displayComments(comments);
    });
});
