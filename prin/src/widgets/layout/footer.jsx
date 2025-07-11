import PropTypes from "prop-types";
import { Typography } from "@material-tailwind/react";

export function Footer({ routes }) {
  const year = new Date().getFullYear();

  return (
    <footer className="py-4">
      <div className="flex flex-col items-center gap-4 px-4 md:flex-row md:justify-between">
        {/* Texto corporativo */}
        <Typography variant="small" className="text-blue-gray-600">
          © {year} Equipo de Green Modern AgriFARM. Todos los derechos reservados.
        </Typography>

        {/* Enlaces opcionales (About, Contacto, etc.) */}
        <ul className="flex gap-6">
          {routes.map(({ name, path }) => (
            <li key={name}>
              <Typography
                as="a"
                href={path}
                variant="small"
                className="font-normal text-blue-gray-600 transition-colors hover:text-green-700"
              >
                {name}
              </Typography>
            </li>
          ))}
        </ul>
      </div>
    </footer>
  );
}

Footer.defaultProps = {
  brandName: "Equipo Chisitos",
  brandLink: "https://www.creative-tim.com",
  routes: [
    { name: "Equipo Chisitos", path: "https://www.creative-tim.com" },
    { name: "About Us", path: "https://www.creative-tim.com/presentation" },
    { name: "Blog", path: "https://www.creative-tim.com/blog" },
    { name: "License", path: "https://www.creative-tim.com/license" },
  ],
};

Footer.propTypes = {
  brandName: PropTypes.string,
  brandLink: PropTypes.string,
  routes: PropTypes.arrayOf(PropTypes.object),
};

Footer.displayName = "/src/widgets/layout/footer.jsx";

export default Footer;
