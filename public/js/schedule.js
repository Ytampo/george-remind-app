// チェックボックスの状態を保存する関数
function saveCheckboxStates() {
    const checkboxes = document.querySelectorAll('.checkbox');
    const states = Array.from(checkboxes).map(checkbox => checkbox.checked);
    localStorage.setItem('checkboxStates', JSON.stringify(states));
}

// チェックボックスの状態を読み込む関数
function loadCheckboxStates() {
    const states = JSON.parse(localStorage.getItem('checkboxStates'));
    if (states) {
        const checkboxes = document.querySelectorAll('.checkbox');
        checkboxes.forEach((checkbox, index) => {
            checkbox.checked = states[index];
        });
    }
}

// DOMが読み込まれた後にチェックボックスの状態を復元する
document.addEventListener('DOMContentLoaded', () => {
    loadCheckboxStates();

    // 保存ボタンにイベントリスナーを追加して、クリックされたときに保存する
    const saveButton = document.getElementById('save-button');
    saveButton.addEventListener('click', () => {
        saveCheckboxStates();
        alert('チェックボックスの状態が保存されました');
    });
});