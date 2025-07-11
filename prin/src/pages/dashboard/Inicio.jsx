// src/pages/dashboard/Inicio.jsx
import React from "react";
import {
  Typography,
  Card,
  CardBody,
} from "@material-tailwind/react";
import {
  LineChart,
  Line,
  XAxis,
  YAxis,
  Tooltip,
  ResponsiveContainer,
} from "recharts";
import {
  SunIcon,
  ExclamationTriangleIcon,
  CloudIcon,
  BugAntIcon,
  CalculatorIcon,
  ArrowTrendingUpIcon,
} from "@heroicons/react/24/solid";

/* ─────────── Datos DEMO (cámbialos por datos de tu API) ─────────── */
const rendimientoData = [
  { name: "Día 1", value: 10 },
  { name: "Día 5", value: 12 },
  { name: "Día 10", value: 11 },
  { name: "Día 15", value: 14 },
  { name: "Día 20", value: 17 },
  { name: "Día 25", value: 18 },
  { name: "Hoy", value: 22 },
];

const quickActions = [
  {
    label: "Monitoreo\nClimático",
    Icon: CloudIcon,
    bg: "bg-yellow-50",
    color: "text-yellow-600",
  },
  {
    label: "Detección\nde Plagas",
    Icon: BugAntIcon,
    bg: "bg-amber-100",
    color: "text-amber-700",
  },
  {
    label: "Calculadora\nde insumos",
    Icon: CalculatorIcon,
    bg: "bg-green-100",
    color: "text-green-700",
  },
  {
    label: "Predicción\nde Cosechas",
    Icon: ArrowTrendingUpIcon,
    bg: "bg-indigo-50",
    color: "text-indigo-500",
  },
];

/* ────────────────────── Componente principal ────────────────────── */
function Inicio() {
  return (
    <div className="p-6 space-y-10">
      {/* Bienvenida */}
      <div>
        <Typography variant="h3" className="font-bold">
          Bienvenido a Green Modern Agrifarm
        </Typography>
        <Typography color="gray">
          ¡Tu agricultura inteligente comienza aquí!
        </Typography>
      </div>

      {/* Tarjetas KPI */}
      <div className="grid gap-4 md:grid-cols-3">
        {/* Cultivos activos */}
        <Card className="shadow-sm">
          <CardBody>
            <Typography variant="small" color="gray">
              Tus cultivos activos
            </Typography>
            <Typography variant="h3" className="text-green-600">
              12
            </Typography>
          </CardBody>
        </Card>

        {/* Alertas del día */}
        <Card className="shadow-sm bg-yellow-50">
          <CardBody>
            <Typography variant="small" color="gray">
              Alertas del día
            </Typography>
            <Typography variant="h3" color="orange">
              3
            </Typography>
          </CardBody>
        </Card>

        {/* Clima actual */}
        <Card className="shadow-sm">
          <CardBody className="flex items-center gap-4">
            <div className="grid h-12 w-12 place-items-center rounded-xl bg-blue-100">
              <SunIcon className="h-8 w-8 text-yellow-500" />
            </div>
            <div>
              <Typography variant="h4">26 °C</Typography>
              <Typography color="gray" className="text-sm">
                Soleado
              </Typography>
            </div>
          </CardBody>
        </Card>
      </div>

      {/* --- RENDIMIENTO + ALERTAS EN UNA SOLA FILA --- */}
      <div className="grid gap-4 md:grid-cols-3">
        {/* Gráfica (ocupa 2 columnas en ≥ md) */}
        <Card className="shadow-sm md:col-span-2">
          <CardBody>
            <Typography variant="h6" className="mb-4">
              Rendimiento&nbsp;(últimos&nbsp;30&nbsp;días)
            </Typography>
            <ResponsiveContainer width="100%" height={220}>
              <LineChart data={rendimientoData}>
                <XAxis dataKey="name" />
                <YAxis />
                <Tooltip />
                <Line
                  type="monotone"
                  dataKey="value"
                  stroke="#22c55e"
                  strokeWidth={3}
                  dot={{ r: 4 }}
                />
              </LineChart>
            </ResponsiveContainer>
          </CardBody>
        </Card>

        {/* Tarjeta de alertas (1 columna) */}
        <Card className="shadow-sm flex items-center gap-4 p-4 bg-orange-50 self-start">
          <ExclamationTriangleIcon className="h-8 w-8 text-orange-600" />
          <div>
            <Typography variant="h6">Alertas</Typography>
            <Typography color="gray" className="text-sm">
              Tienes 3 alertas pendientes
            </Typography>
          </div>
        </Card>
      </div>

      {/* ---------- Accesos rápidos ---------- */}
      <div className="grid gap-4 md:grid-cols-4">
        {quickActions.map(({ label, Icon, bg, color }) => (
          <Card
            key={label}
            className={`flex flex-col items-center gap-3 p-6 cursor-pointer hover:shadow-md transition rounded-xl ${bg}`}
          >
            <Icon className={`h-8 w-8 ${color}`} />
            <Typography
              className="text-center font-medium whitespace-pre-line text-blue-gray-700"
            >
              {label}
            </Typography>
          </Card>
        ))}
      </div>
    </div>
  );
}

export default Inicio;
