import "./App.css";
import {
  createBrowserRouter,
  createRoutesFromElements,
  Route,
  RouterProvider,
} from "react-router-dom";
import {
  ourDoctors,
  doctorProfile,
  PageNotFound,
} from "./Pages/our-doctors-pages/index";
import {
  ourDoctors as ourNurses,
  doctorProfile as nurseProfile,
} from "./Pages/our-nurses-pages/index";
import {
  ourDoctors as ourPharmacists,
  doctorProfile as pharmacistProfile,
} from "./Pages/our-pharmacists-pages/index";
import homePage from "./Pages/home-page/homePage";
import Sign from "./Pages/Sign-in-up-page/Sign";

const router = createBrowserRouter(
  createRoutesFromElements(
    <Route>
      <Route index path="/" Component={homePage} />
      <Route path="/register" Component={Sign} />
      <Route path="/our-doctors" Component={ourDoctors} />
      <Route path="/our-doctors/:address" Component={ourDoctors} />
      <Route path="/our-nurses" Component={ourNurses} />
      <Route path="/our-pharmacists" Component={ourPharmacists} />
      <Route path="/doctor-profile/:doctorId" Component={doctorProfile} />
      <Route path="*" Component={PageNotFound} />
    </Route>
  )
);
const App = () => {
  return (
    <>
      <RouterProvider router={router} />
    </>
  );
};
export default App;
