import toast from '../index.js';

function showErrorToast(message) {
    toast({
        title: "Thất bại!",
        message: message,
        type: "error",
        duration: 5000
    });
}

export default showErrorToast
