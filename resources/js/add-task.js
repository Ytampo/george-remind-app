// 間違えてresourcesの中に入れちゃったファイル。変更前のコードとして残してる

document.addEventListener('DOMContentLoaded', (event) => {
    flatpickr("#datepicker", {
        dateFormat: "Y-m-d",
    });

    document.getElementById('task-form').addEventListener('submit', function(event) {
        event.preventDefault(); // デフォルトのフォーム送信を防ぐ

        let formData = new FormData(this);

        fetch('/tasks', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: new URLSearchParams(formData).toString() // フォームデータをURLエンコード形式で送信
        })
        .then(response => {
            return response.json();
        })
        .then(data => {
            if (data.message) {
                alert('課題が保存されました');
            } else {
                console.error('Error in response data:', data);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});
