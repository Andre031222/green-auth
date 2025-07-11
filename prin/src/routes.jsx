import {
  HomeIcon,
  SunIcon,
  Squares2X2Icon,
  BeakerIcon,
  BugAntIcon,
  BookOpenIcon,
  ChatBubbleLeftRightIcon,
  ChartBarIcon,
  ShoppingBagIcon,
  ClipboardDocumentIcon,
  ServerStackIcon,
  RectangleStackIcon,
} from "@heroicons/react/24/solid";
import { Inicio, Clima, CultivoInsumos, DeteccionPlagas, Formacion, Asesoria, Prediccion, Comercio, Informes} from "@/pages/dashboard";
import { SignIn, SignUp } from "@/pages/auth";

const icon = {
  className: "w-5 h-5 text-inherit",
};

export const routes = [
  {
    layout: "dashboard",
    pages: [
      {
        icon: <HomeIcon {...icon} />,
        name: "Inicio",
        path: "/inicio",
        element: <Inicio />,
      },
      {
        icon: <SunIcon {...icon} />,
        name: "Clima",
        path: "/clima",
        element: <Clima />,
      },
      {
        icon: <Squares2X2Icon {...icon} />,
        name: "Gestión de Cultivo",
        collapse: true, // Activa el modo desplegable
        pages: [
          {
            icon: <BeakerIcon {...icon} />,
            name: "Cultivo de Insumos",
            path: "/cultivo-insumos",
            element: <CultivoInsumos />,
          },
          {
            icon: <BugAntIcon {...icon} />,
            name: "Detección de Plagas",
            path: "/deteccion-plagas",
            element: <DeteccionPlagas />,
          },
        ],
      },
      {
        icon: <BookOpenIcon {...icon} />,
        name: "Formación Continua",
        path: "/formacion",
        element: <Formacion />,
      },
      {
        icon: <ChatBubbleLeftRightIcon {...icon} />,
        name: "Asesoría",
        path: "/asesoria",
        element: <Asesoria />,
      },
      {
        icon: <ChartBarIcon {...icon} />,
        name: "Predicción",
        path: "/prediccion",
        element: <Prediccion />,
      },
      {
        icon: <ShoppingBagIcon {...icon} />,
        name: "Compra y Venta",
        path: "/comercio",
        element: <Comercio />,
      },
      {
        icon: <ClipboardDocumentIcon {...icon} />,
        name: "Informes",
        path: "/informes",
        element: <Informes />,
      },
    ],
  },
  {
    title: "auth pages",
    layout: "auth",
    pages: [
      {
        icon: <ServerStackIcon {...icon} />,
        name: "sign in",
        path: "/sign-in",
        element: <SignIn />,
      },
      {
        icon: <RectangleStackIcon {...icon} />,
        name: "sign up",
        path: "/sign-up",
        element: <SignUp />,
      },
    ],
  },
];

export default routes;
