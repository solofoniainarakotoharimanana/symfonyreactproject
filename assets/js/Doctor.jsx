import { render } from "react-dom";

import { useFetchDatas } from "./hooks";
import { useEffect, useState } from "react";

import DoctorList from "./components/DoctorList";
import SearchBar from "./components/SearchBar";

function Title({ title }) {
  return <h4 className="my-3 lead">{title}</h4>;
}

function Doctors() {
  const { loading, doctors, load, hasMore } = useFetchDatas(
    "http://localhost:8000/api/users"
  );

  const [formValues, setFormValues] = useState({
    nameSearch: "",
    specialitySearch: "",
  });

  const getSearchText = (e) => {
    setFormValues({ ...formValues, [e.target.name]: e.target.value });
  };

  const filterDoctors = doctors.filter((d) => {
    let containsFirstnameOrLastName = null;
    let containsSpeciality = null;

    containsFirstnameOrLastName =
      d.firstname
        .trim()
        .toLowerCase()
        .includes(formValues.nameSearch.toLowerCase().trim()) ||
      d.lastname
        .trim()
        .toLowerCase()
        .includes(formValues.nameSearch.toLowerCase().trim());

    containsSpeciality = d.specialities.some(({ name }) =>
      name.toLowerCase().includes(formValues.specialitySearch.toLowerCase())
    );

    if (formValues.nameSearch !== "" && formValues.specialitySearch === "") {
      return containsFirstnameOrLastName;
    } else if (
      formValues.nameSearch === "" &&
      formValues.specialitySearch !== ""
    )
      return containsSpeciality;
    else if (formValues.nameSearch !== "" && formValues.specialitySearch !== "")
      return containsFirstnameOrLastName && containsSpeciality;
    else return doctors;
  });

  useEffect(() => {
    load();
  }, []);

  return (
    <div className="container mt-5">
      {loading && "Chargement ..."}
      <SearchBar onChange={getSearchText} />

      {hasMore && (
        <button className="btn btn-primary d-block mt-3" onClick={load}>
          Charger plus de médecin
        </button>
      )}
      {<Title title="Prendre un rendez-vous chez un docteur" />}
      {doctors && <DoctorList doctors={filterDoctors} />}
    </div>
  );
}

class DoctorsElements extends HTMLElement {
  connectedCallback() {
    render(<Doctors />, this);
  }
}

customElements.define("doctor-elements", DoctorsElements);
