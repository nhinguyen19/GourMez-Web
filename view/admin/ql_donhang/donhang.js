document.addEventListener('DOMContentLoaded', function () {
    const statusSelect = document.getElementById('status');
    const staffSelect = document.getElementById('staff');

    // Function to handle status change
    function handleStatusChange() {
        const status = statusSelect.value;
        if (status === 'Đang giao hàng') {
            // Display input fields for driver information
            document.getElementById('additionalStatusInfo').innerHTML = `
                <label for="driverName">Tên tài xế:</label>
                <input type="text" id="driverName" name="driverName" required>
                <label for="driverPhone">Số điện thoại tài xế:</label>
                <input type="text" id="driverPhone" name="driverPhone" required>
            `;
        } else {
            // Clear additional fields
            document.getElementById('additionalStatusInfo').innerHTML = '';
        }
    }

    // Function to handle staff change
    function handleStaffChange() {
        const staffId = staffSelect.value;
        if (staffId) {
            // Display additional information for selected staff
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `getStaffInfo.php?staff_id=${staffId}`, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById('additionalStaffInfo').innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        } else {
            document.getElementById('additionalStaffInfo').innerHTML = '';
        }
    }

    statusSelect.addEventListener('change', handleStatusChange);
    staffSelect.addEventListener('change', handleStaffChange);

    // Initial check on page load
    handleStatusChange();
    handleStaffChange();
});
