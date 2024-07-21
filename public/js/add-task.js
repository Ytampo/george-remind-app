document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('add-button').addEventListener('click', function (e) {
        e.preventDefault();

        let taskName = document.querySelector('input[name="task-name"]').value;
        let dateLimit = document.querySelector('input[name="date-limit"]').value;
        let taskTime = document.querySelector('input[name="time-limit"]').value;
        let priority = document.querySelector('select[name="priority"]').value;

        fetch('/tasks', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                'task-name': taskName,
                'date-limit': dateLimit,
                'time-limit': taskTime,
                'priority': priority
            })
        })
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    alert(data.message);
                    window.location.href = '/my-tasks';
                } else {
                    console.error('Unexpected response:', data);
                }
            })
            .catch(error => {
                console.error('add-task.jsからのエラー:', error),
                alert("エラーです。きちんと入力しているか確認してください")
            });
    });
});
