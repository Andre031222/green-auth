// src/widgets/layout/Sidenav.jsx
import React, { useState } from "react";
import PropTypes from "prop-types";
import { Link, NavLink } from "react-router-dom";
import { XMarkIcon } from "@heroicons/react/24/outline";
import {
  Button,
  IconButton,
  Typography,
} from "@material-tailwind/react";
import {
  useMaterialTailwindController,
  setOpenSidenav,
} from "@/context";

export function Sidenav({ brandImg, brandName, routes }) {
  const [controller, dispatch] = useMaterialTailwindController();
  const { sidenavColor, sidenavType, openSidenav } = controller;

  const sidenavTypes = {
    dark: "bg-gradient-to-br from-gray-800 to-gray-900",
    white: "bg-white shadow-sm",
    transparent: "bg-transparent",
  };

  return (
    <aside
      className={`${sidenavTypes[sidenavType]} ${
        openSidenav ? "translate-x-0" : "-translate-x-80"
      } fixed inset-0 z-50 my-4 ml-4 h-[calc(100vh-32px)] w-72 rounded-xl transition-transform duration-300 xl:translate-x-0 border border-blue-gray-100`}
    >
      {/* Header */}
      <div className="relative">
        <Link to="/" className="flex justify-center py-1 px-4">
          {brandImg && (
            <img
              src={brandImg}
              alt="AgriFARM logo"
              className="h-44 w-auto mb-2"
            />
          )}
        </Link>

        {/* Close button (mobile) */}
        <IconButton
          variant="text"
          color="white"
          size="sm"
          ripple={false}
          className="absolute right-0 top-0 grid rounded-br-none rounded-tl-none xl:hidden"
          onClick={() => setOpenSidenav(dispatch, false)}
        >
          <XMarkIcon strokeWidth={2.5} className="h-5 w-5 text-white" />
        </IconButton>
      </div>

      {/* Menu */}
      <div className="m-4 overflow-y-auto h-[calc(100%-120px)] pr-1">
        {routes.map(({ layout, title, pages }, sectionKey) => (
          <ul key={sectionKey} className="mb-4 flex flex-col gap-1">
            {title && (
              <li className="mx-3.5 mt-4 mb-2">
                <Typography
                  variant="small"
                  color={sidenavType === "dark" ? "white" : "blue-gray"}
                  className="font-black uppercase opacity-75"
                >
                  {title}
                </Typography>
              </li>
            )}

            {pages.map(
              ({ icon, name, path, collapse, pages: subPages }) => {
                // ---------- ÍTEM CON SUBMENÚ ----------
                if (collapse && Array.isArray(subPages)) {
                  const [open, setOpen] = useState(false);

                  return (
                    <li key={name}>
                      {/* Botón padre */}
                      <Button
                        onClick={() => setOpen(!open)}
                        variant="text"
                        color={
                          sidenavType === "dark" ? "white" : "blue-gray"
                        }
                        className="flex items-center justify-between gap-4 px-4 capitalize w-full"
                      >
                        <div className="flex items-center gap-4">
                          {icon}
                          <Typography
                            color="inherit"
                            className="font-medium capitalize"
                          >
                            {name}
                          </Typography>
                        </div>
                        <span className="text-xs">
                          {open ? "▲" : "▼"}
                        </span>
                      </Button>

                      {/* Sub-rutas */}
                      {open && (
                        <ul className="ml-6 mt-1 flex flex-col gap-1">
                          {subPages.map(({ icon, name, path }) => (
                            <li key={name}>
                              <NavLink to={`/${layout}${path}`}>
                                {({ isActive }) => (
                                  <Button
                                    variant={isActive ? "gradient" : "text"}
                                    color={isActive ? "green" : sidenavType === "dark" ? "white" : "blue-gray"
                                    }
                                    className="flex items-center gap-4 px-4 capitalize"
                                    fullWidth
                                  >
                                    {icon}
                                    <Typography
                                      color="inherit"
                                      className="font-medium capitalize"
                                    >
                                      {name}
                                    </Typography>
                                  </Button>
                                )}
                              </NavLink>
                            </li>
                          ))}
                        </ul>
                      )}
                    </li>
                  );
                }

                // ---------- ÍTEM NORMAL ----------
                return (
                  <li key={name}>
                    <NavLink to={`/${layout}${path}`}>
                      {({ isActive }) => (
                        <Button
                          variant={isActive ? "gradient" : "text"}
                          color={isActive ? "green" : sidenavType === "dark" ? "white" : "blue-gray"
                          }
                          className="flex items-center gap-4 px-4 capitalize"
                          fullWidth
                        >
                          {icon}
                          <Typography
                            color="inherit"
                            className="font-medium capitalize"
                          >
                            {name}
                          </Typography>
                        </Button>
                      )}
                    </NavLink>
                  </li>
                );
              }
            )}
          </ul>
        ))}
      </div>
    </aside>
  );
}

Sidenav.defaultProps = {
  brandImg: "/img/agrifarm-logo.png",
  brandName: "AGRIFARM",
};

Sidenav.propTypes = {
  brandImg: PropTypes.string,
  brandName: PropTypes.string,
  routes: PropTypes.arrayOf(PropTypes.object).isRequired,
};

Sidenav.displayName = "/src/widgets/layout/Sidenav.jsx";

export default Sidenav;
