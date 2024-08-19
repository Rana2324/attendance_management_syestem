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
    const showInstitution =(id) => {

        return axios.get(`/api/institutions/${id}`)
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
    const updateInstitution =(id,payload) => {

             return axios.put(`/api/institutions/${id}`,payload)
              .then((response)=>{
                  return response.data;
              })
              .catch(error=>{
                console.log(error)
              });

    }
    const deleteInstitution =(id) => {

             return axios.delete(`/api/institutions/${id}`)
              .then((response)=>{
                  return response.data;
              })
              .catch(error=>{
                console.log(error)
              });

    }

    return {listInstitutions,showInstitution,storeInstitution,updateInstitution,deleteInstitution};
}
