export function useInstitutions(){

    const listInstitutions =() => {

             return axios.get("/api/institutions")
              .then((response)=>{
                  return response.data;
              })
              .catch(error=>{
                console.log(error)
              });

    }
    const storeInstitution =(payload) => {

             return axios.post("/api/institutions",payload)
              .then((response)=>{
                  return response.data;
              })
              .catch(error=>{
                console.log(error)
              });

    }

    return {listInstitutions,storeInstitution};
}
