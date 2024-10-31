import { DoctorAPI } from "./DoctorAPI";
import { useState, useCallback } from "react";

export function useFetchDatas(url) {
  const [loading, setLoading] = useState(false);
  const [doctors, setDoctors] = useState([]);
  const [next, setNext] = useState(null);

  const load = useCallback(async () => {
    // const response = await fetch(url);
    // const responseDatas = await response.json();
    // if (response.ok) {
    //   setDoctors(responseDatas["member"]);
    // }

    setLoading(true);
    const response = await DoctorAPI.fetchData(next || url);
    setDoctors((items) => [...items, ...response["member"]]);

    if (response["view"] && response["view"]["next"]) {
      setNext(response["view"]["next"]);
    } else {
      setNext(null);
    }
    setLoading(false);
  }, [next || url]);
  return {
    loading,
    doctors,
    load,
    hasMore: next !== null,
  };
}
