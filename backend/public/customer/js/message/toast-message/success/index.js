import toast from '../index.js';

function showSuccessToast(message) {
    toast({
        title: "Thành công!",
        message: message,
        type: "success",
        duration: 5000
    });
}

export default showSuccessToast
