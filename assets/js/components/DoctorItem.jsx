import React, { useEffect, useState } from "react";
import profile from "../../images/profile.png";

const DoctorItem = ({ doctor }) => {
  // console.log(doctor);
  const [specialities, setSpecialities] = useState("");
  let listSpeciality = [];
  useEffect(() => {
    doctor.specialities.forEach((s) => {
      listSpeciality.push(s.name);
    });
    setSpecialities(listSpeciality.join("-"));
  }, []);

  return (
    <div className="shadow-sm p-3 my-4">
      <div className="row">
        <div className="col-8">
          <div className="row">
            <div className="col-3">
              <img
                src={profile}
                className="w-100 rounded-circle img-thumbnail"
                alt="Practitien profile"
              />
            </div>
            <div className="col-9">
              <div className="d-flex flex-column">
                <h6 className="text-primary">
                  DR {doctor.firstname} {doctor.lastname}
                </h6>
                <small className="text-muted d-block mb-3">
                  {specialities}
                </small>
                <small className="text-muted">
                  {doctor.addresses[0]?.address}
                </small>
                <small className="text-muted">
                  {doctor.addresses[0]?.city}
                </small>
                <small className="text-muted">
                  {doctor.addresses[0]?.road}
                </small>
              </div>
            </div>
          </div>
        </div>
        <div className="col-4">Rendez-vous</div>
      </div>
    </div>
  );
};

export default DoctorItem;
