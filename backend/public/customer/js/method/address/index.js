
function handleAddressLocal(data, authUser) {
    let address = (data.user.address).split(' - ')

    const newAuthUser = {
        token: authUser.token,
        user: {
            id: data.user.id,
            name: data.user.name,
            phone: data.user.phone,
            email: data.user.email,
            image: data.user.image_url,
            province: address[0],
            district: address[1],
            ward: address[2],
        }
    }

    localStorage.setItem('authUser', JSON.stringify(newAuthUser));
}

export default handleAddressLocal;
