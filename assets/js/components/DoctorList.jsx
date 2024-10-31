import React from "react";
import DoctorItem from "./DoctorItem";

const DoctorList = ({ doctors }) => {
  return (
    <div className="mt-3">
      <div className="row">
        <div className="col-sm-12 col-md-9 col-lg-9 ">
          {doctors &&
            doctors.map((doctor) => {
              return <DoctorItem key={doctor.slug} doctor={doctor} />;
            })}
        </div>
        <div className="d-sm-none col-md-3 col-lg-3">Localization</div>
      </div>
    </div>
  );
};

export default DoctorList;
