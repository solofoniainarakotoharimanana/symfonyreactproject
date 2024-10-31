import axios from "axios";

export class DoctorAPI {
  static async fetchData(url) {
    return (await axios.get(url)).data;
  }
}
