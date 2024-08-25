export function useInstitutionAdmin() {
    const adminList = () => {
        return axios
            .get("/api/institution-admin")
            .then((response) => {
                return response.data;
            })
            .catch((error) => {
                console.log(error);
            });
    };
    const showAdmin = (id) => {
        return axios
            .get(`/api/institution-admin/${id}`)
            .then((response) => {
                return response.data;
            })
            .catch((error) => {
                console.log(error);
            });
    };
    const storeAdmin = (payload) => {
        return axios
            .post("/api/institution-admin", payload)
            .then((response) => {
                return response.data;
            })
            .catch((error) => {
                console.log(error);
            });
    };
    const updateAdmin = (id, payload) => {
        return axios
            .put(`/api/institution-admin/${id}`, payload)
            .then((response) => {
                return response.data;
            })
            .catch((error) => {
                console.log(error);
            });
    };
    const deleteAdmin = (id) => {
        return axios
            .delete(`/api/institution-admin/${id}`)
            .then((response) => {
                return response.data;
            })
            .catch((error) => {
                console.log(error);
            });
    };

    return {
        adminList,
        showAdmin,
        storeAdmin,
        updateAdmin,
        deleteAdmin,
    };
}
