export function useAuth() {
    const login = (payload) => {
        return axios
            .post("/api/login", payload)
            .then((response) => {
                return response.data;
            })
            .catch((error) => {
                console.log(error);
            });
    };
    return { login };
}
