
function renderComment (data) {
    document.querySelector('.comment').innerHTML = data.map(e => {
        return `
            <div class="user-wrapper">
                <div class="user-avatar">
                    <img src="${e.image_url !== null ? e.image_url  : 'https://i0.wp.com/thatnhucuocsong.com.vn/wp-content/uploads/2023/02/Hinh-anh-avatar-Facebook.jpg?resize=800%2C800&ssl=1'}" alt="User Avatar" />
                </div>
                <div class="comment-body">
                    <h4 class="comment-user">${e.user_name}</h4>
                    <p class="comment-text">${e.content}</p>
                    <span class="comment-time">${e.created_at}</span>
                </div>
            </div>
        `
    }).join('')
}

export default renderComment;
