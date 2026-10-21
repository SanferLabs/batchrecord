import React, { useState } from 'react';
import { motion, AnimatePresence } from 'framer-motion';

/**
 * Portal / Landing Page Minimalista — Batch Record Electrónico (BPF / GMP)
 * Estética: Apple Glassmorphism / Vibrant Translucency (macOS & iPadOS HIG)
 *
 * Especificaciones Técnicas de Cristal (Glassmorphic Spec):
 * - Paneles Blancos:       background: rgba(255, 255, 255, 0.65)
 * - Sidebar Institucional: background: rgba(45, 55, 72, 0.75)
 * - Tarjetas con Acento:   background: rgba(243, 232, 237, 0.70)
 * - Desenfoque Vibrancy:   backdrop-filter: blur(25px) saturate(180%)
 * - Borde de Cristal 1px:  border: 1px solid rgba(255, 255, 255, 0.4)
 * - Sombra Difusa Amplia:  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.06)
 * - Redondeo Squircle:     border-radius: 20px (Hero Card: 24px)
 * - Física Spring Hover:   scale: 1.01 (stiffness: 380, damping: 28)
 */

// Configuración de física tipo resorte natural (Apple Spring Motion)
const appleSpring = {
  type: 'spring',
  stiffness: 380,
  damping: 28,
  mass: 0.9,
};

// Variables de estilo Glassmorphic reutilizables
export const glassStyles = {
  sidebar: {
    background: 'rgba(45, 55, 72, 0.75)',
    backdropFilter: 'blur(25px) saturate(180%)',
    WebkitBackdropFilter: 'blur(25px) saturate(180%)',
    borderRight: '1px solid rgba(255, 255, 255, 0.4)',
    boxShadow: '0 20px 40px rgba(0, 0, 0, 0.14)',
  },
  panel: {
    background: 'rgba(255, 255, 255, 0.65)',
    backdropFilter: 'blur(25px) saturate(180%)',
    WebkitBackdropFilter: 'blur(25px) saturate(180%)',
    border: '1px solid rgba(255, 255, 255, 0.4)',
    boxShadow: '0 20px 40px rgba(0, 0, 0, 0.06)',
    borderRadius: '20px',
  },
  heroCard: {
    background: 'rgba(255, 255, 255, 0.65)',
    backdropFilter: 'blur(25px) saturate(180%)',
    WebkitBackdropFilter: 'blur(25px) saturate(180%)',
    border: '1px solid rgba(255, 255, 255, 0.4)',
    boxShadow: '0 20px 40px rgba(0, 0, 0, 0.06), inset 0 1px 0 rgba(255, 255, 255, 0.75)',
    borderRadius: '24px',
  },
  accentPanel: {
    background: 'rgba(243, 232, 237, 0.70)',
    backdropFilter: 'blur(25px) saturate(180%)',
    WebkitBackdropFilter: 'blur(25px) saturate(180%)',
    border: '1px solid rgba(255, 255, 255, 0.4)',
    boxShadow: '0 20px 40px rgba(0, 0, 0, 0.06)',
    borderRadius: '20px',
  },
  primaryButton: {
    background: 'linear-gradient(135deg, #2d3748 0%, #4a5568 55%, #666F88 100%)',
    border: '1px solid rgba(255, 255, 255, 0.35)',
    boxShadow: '0 14px 28px rgba(45, 55, 72, 0.24), inset 0 1px 0 rgba(255, 255, 255, 0.25)',
    borderRadius: '16px',
  },
  secondaryGlassButton: {
    background: 'rgba(255, 255, 255, 0.65)',
    backdropFilter: 'blur(25px) saturate(180%)',
    WebkitBackdropFilter: 'blur(25px) saturate(180%)',
    border: '1px solid rgba(255, 255, 255, 0.4)',
    boxShadow: '0 10px 24px rgba(0, 0, 0, 0.05), inset 0 1px 0 rgba(255, 255, 255, 0.85)',
    borderRadius: '16px',
  },
};

// Iconografía estilo SF Symbols (strokeWidth consistente de 1.8)
const SFSymbols = {
  House: () => (
    <svg className="w-[18px] h-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.8" strokeLinecap="round" strokeLinejoin="round">
      <path d="M3 10.5L12 3l9 7.5V20a1 1 0 0 1-1 1h-5.5v-6h-5v6H4a1 1 0 0 1-1-1v-9.5z" />
    </svg>
  ),
  DocBadgePlus: () => (
    <svg className="w-[18px] h-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.8" strokeLinecap="round" strokeLinejoin="round">
      <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
      <polyline points="14 2 14 8 20 8" />
      <line x1="12" y1="18" x2="12" y2="12" />
      <line x1="9" y1="15" x2="15" y2="15" />
    </svg>
  ),
  ClockArrowCirclepath: () => (
    <svg className="w-[18px] h-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.8" strokeLinecap="round" strokeLinejoin="round">
      <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8" />
      <path d="M3 3v5h5" />
      <path d="M12 7v5l4 2" />
    </svg>
  ),
  CylinderSplit: () => (
    <svg className="w-[18px] h-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.8" strokeLinecap="round" strokeLinejoin="round">
      <ellipse cx="12" cy="5" rx="8" ry="3" />
      <path d="M4 5v14c0 1.66 3.58 3 8 3s8-1.34 8-3V5" />
      <path d="M4 12c0 1.66 3.58 3 8 3s8-1.34 8-3" />
    </svg>
  ),
  Gearshape: () => (
    <svg className="w-[18px] h-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.8" strokeLinecap="round" strokeLinejoin="round">
      <circle cx="12" cy="12" r="3" />
      <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9c.26.604.852.997 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z" />
    </svg>
  ),
  SidebarLeft: () => (
    <svg className="w-[18px] h-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.8" strokeLinecap="round" strokeLinejoin="round">
      <rect x="3" y="4" width="18" height="16" rx="3" />
      <line x1="9" y1="4" x2="9" y2="20" />
    </svg>
  ),
  PlusCircle: () => (
    <svg className="w-[18px] h-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
      <line x1="12" y1="5" x2="12" y2="19" />
      <line x1="5" y1="12" x2="19" y2="12" />
    </svg>
  ),
  MagnifyingGlass: () => (
    <svg className="w-[18px] h-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.9" strokeLinecap="round" strokeLinejoin="round">
      <circle cx="11" cy="11" r="7" />
      <line x1="20" y1="20" x2="16.2" y2="16.2" />
    </svg>
  ),
  CheckmarkShield: () => (
    <svg className="w-[16px] h-[16px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.9" strokeLinecap="round" strokeLinejoin="round">
      <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
      <path d="M9 12l2 2 4-4" />
    </svg>
  ),
  ArrowRightSquare: () => (
    <svg className="w-[17px] h-[17px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.8" strokeLinecap="round" strokeLinejoin="round">
      <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
      <polyline points="16 17 21 12 16 7" />
      <line x1="21" y1="12" x2="9" y2="12" />
    </svg>
  ),
};

const MENU_ITEMS = [
  { id: 'inicio', label: 'Inicio', icon: SFSymbols.House },
  { id: 'ordenes', label: 'Órdenes de Producción', icon: SFSymbols.DocBadgePlus },
  { id: 'historial', label: 'En Proceso', icon: SFSymbols.ClockArrowCirclepath },
  { id: 'bd', label: 'Base de Datos', icon: SFSymbols.CylinderSplit },
  { id: 'configuracion', label: 'Configuración', icon: SFSymbols.Gearshape },
];

export default function AppleHIGDashboard({
  userName = 'Brenda Campos',
  userRole = 'Administrador / Analista de Calidad',
  activeBatch = {
    lote: 'L2',
    orden: 'OP-2026-0487',
    producto: '332FB487 (09) ANDANTOL GEL',
    etapa: 'Paso 4 de 7 · Fabricación del Producto',
    progreso: 57,
  },
  metrics = {
    total: 1,
    enProceso: 1,
    verificacion: 0,
    finalizados: 0,
  },
  onCreateNewBatch,
  onSearchExistingBatch,
}) {
  const [activeTab, setActiveTab] = useState('inicio');
  const [sidebarCollapsed, setSidebarCollapsed] = useState(false);

  return (
    <div
      className="relative min-h-screen flex overflow-hidden text-[#1d1d1f] antialiased select-none"
      style={{
        fontFamily:
          "-apple-system, BlinkMacSystemFont, 'SF Pro Display', 'SF Pro Text', 'Inter', system-ui, sans-serif",
      }}
    >
      {/* ===================================================================== */}
      {/* 0. FONDO DINÁMICO DE LA MARCA (BACKGROUND LAYER PARA TRANSPARENCIA)   */}
      {/* ===================================================================== */}
      <div className="fixed inset-0 -z-10 pointer-events-none overflow-hidden bg-gradient-to-br from-[#eef1f6] via-[#e4e9f2] to-[#f3e8ed]">
        <div
          className="absolute -top-28 -left-24 w-[540px] h-[540px] rounded-full opacity-70 blur-3xl"
          style={{
            background: 'radial-gradient(circle, rgba(102, 111, 136, 0.34) 0%, rgba(102, 111, 136, 0) 70%)',
          }}
        />
        <div
          className="absolute top-1/4 -right-24 w-[500px] h-[500px] rounded-full opacity-80 blur-3xl"
          style={{
            background: 'radial-gradient(circle, rgba(243, 232, 237, 0.95) 0%, rgba(216, 190, 205, 0) 70%)',
          }}
        />
        <div
          className="absolute -bottom-32 left-1/3 w-[600px] h-[440px] rounded-full opacity-60 blur-3xl"
          style={{
            background: 'radial-gradient(circle, rgba(45, 55, 72, 0.22) 0%, rgba(45, 55, 72, 0) 70%)',
          }}
        />
      </div>

      {/* ===================================================================== */}
      {/* 1. BARRA LATERAL (SIDEBAR GLASS — rgba(45, 55, 72, 0.75) + blur 25px) */}
      {/* ===================================================================== */}
      <motion.aside
        animate={{ width: sidebarCollapsed ? 80 : 256 }}
        transition={appleSpring}
        style={glassStyles.sidebar}
        className="relative z-20 flex flex-col justify-between shrink-0 text-white"
      >
        <div>
          {/* Logo de la empresa / planta en la parte superior */}
          <div className="h-20 px-4 flex items-center justify-between border-b border-white/15">
            <AnimatePresence mode="wait">
              {!sidebarCollapsed && (
                <motion.div
                  key="brand-logo"
                  initial={{ opacity: 0, filter: 'blur(6px)', x: -8 }}
                  animate={{ opacity: 1, filter: 'blur(0px)', x: 0 }}
                  exit={{ opacity: 0, filter: 'blur(6px)', x: -8 }}
                  transition={{ duration: 0.2 }}
                  className="flex items-center gap-2.5 overflow-hidden"
                >
                  <img
                    src="/images/logo_blanco.png"
                    alt="Laboratorios Grimann"
                    className="h-9 object-contain"
                  />
                </motion.div>
              )}
            </AnimatePresence>

            <motion.button
              whileHover={{ scale: 1.06 }}
              whileTap={{ scale: 0.94 }}
              onClick={() => setSidebarCollapsed(!sidebarCollapsed)}
              className="w-9 h-9 rounded-xl bg-white/10 hover:bg-white/20 border border-white/25 flex items-center justify-center text-white/90 transition-colors"
              title="Contraer / Expandir barra lateral"
            >
              <SFSymbols.SidebarLeft />
            </motion.button>
          </div>

          {/* Etiqueta de sección */}
          {!sidebarCollapsed && (
            <div className="px-6 pt-5 pb-1.5 text-[10px] font-bold uppercase tracking-[0.12em] text-white/45">
              Navegación Principal
            </div>
          )}

          {/* Menú limpio: Inicio (seleccionado con acento luminoso), Captura, Historial, Base de Datos, Configuración */}
          <nav className="p-3 space-y-1.5">
            {MENU_ITEMS.map((item) => {
              const Icon = item.icon;
              const isActive = activeTab === item.id;

              return (
                <motion.button
                  key={item.id}
                  onClick={() => setActiveTab(item.id)}
                  whileHover={{ scale: 1.01, x: sidebarCollapsed ? 0 : 2 }}
                  whileTap={{ scale: 0.98 }}
                  transition={appleSpring}
                  className={`relative w-full flex items-center gap-3 px-3.5 py-2.5 rounded-[14px] text-[13.5px] transition-colors ${
                    isActive
                      ? 'text-white font-semibold'
                      : 'text-white/75 hover:text-white hover:bg-white/10 font-medium'
                  }`}
                >
                  {/* Indicador Activo con Acento Luminoso (Framer Motion layoutId) */}
                  {isActive && (
                    <motion.div
                      layoutId="activeSidebarGlassPill"
                      transition={appleSpring}
                      className="absolute inset-0 rounded-[14px]"
                      style={{
                        background:
                          'linear-gradient(135deg, rgba(255, 255, 255, 0.26) 0%, rgba(181, 186, 201, 0.18) 100%)',
                        border: '1px solid rgba(255, 255, 255, 0.45)',
                        boxShadow:
                          '0 8px 24px rgba(0, 0, 0, 0.18), 0 0 18px rgba(255, 255, 255, 0.16), inset 0 1px 0 rgba(255, 255, 255, 0.45)',
                      }}
                    />
                  )}

                  {/* Barra lateral luminosa izquierda */}
                  {isActive && (
                    <motion.span
                      layoutId="activeSidebarLuminescentBar"
                      transition={appleSpring}
                      className="absolute left-1.5 top-2 bottom-2 w-1 rounded-full bg-white shadow-[0_0_10px_rgba(255,255,255,0.95)]"
                    />
                  )}

                  <span className="relative z-10 shrink-0 pl-1">
                    <Icon />
                  </span>

                  <AnimatePresence>
                    {!sidebarCollapsed && (
                      <motion.span
                        initial={{ opacity: 0, filter: 'blur(4px)' }}
                        animate={{ opacity: 1, filter: 'blur(0px)' }}
                        exit={{ opacity: 0, filter: 'blur(4px)' }}
                        transition={{ duration: 0.18 }}
                        className="relative z-10 truncate"
                      >
                        {item.label}
                      </motion.span>
                    )}
                  </AnimatePresence>
                </motion.button>
              );
            })}
          </nav>
        </div>

        {/* Botón de Cerrar Sesión al fondo */}
        <div className="p-3.5 border-t border-white/15">
          <motion.button
            whileHover={{ scale: 1.01 }}
            whileTap={{ scale: 0.98 }}
            transition={appleSpring}
            className="w-full flex items-center justify-center gap-2.5 px-3.5 py-2.5 rounded-[14px] text-xs font-semibold text-white/90 hover:text-white transition-colors"
            style={{
              background: 'rgba(255, 255, 255, 0.10)',
              border: '1px solid rgba(255, 255, 255, 0.30)',
            }}
          >
            <SFSymbols.ArrowRightSquare />
            {!sidebarCollapsed && <span>Cerrar Sesión</span>}
          </motion.button>
        </div>
      </motion.aside>

      {/* ===================================================================== */}
      {/* 2. CONTENEDOR PRINCIPAL (HEADER + HERO CARD DE CRISTAL + MÉTRICAS)    */}
      {/* ===================================================================== */}
      <div className="flex-1 flex flex-col min-w-0">
        {/* Encabezado Superior (Header Glass) */}
        <header
          style={{
            background: 'rgba(255, 255, 255, 0.65)',
            backdropFilter: 'blur(25px) saturate(180%)',
            WebkitBackdropFilter: 'blur(25px) saturate(180%)',
            borderBottom: '1px solid rgba(255, 255, 255, 0.4)',
            boxShadow: '0 20px 40px rgba(0, 0, 0, 0.06)',
          }}
          className="sticky top-0 z-10 h-16 px-8 flex items-center justify-between"
        >
          {/* Breadcrumb sutil: Planta Farmacéutica • Batch Record Electrónico */}
          <div className="flex items-center gap-2.5 text-sm">
            <span className="w-2 h-2 rounded-full bg-[#2d3748] shadow-[0_0_0_4px_rgba(45,55,72,0.12)]" />
            <span className="text-[#666F88] font-medium">Planta Farmacéutica</span>
            <span className="text-[#a3a8b7]">•</span>
            <span className="text-[#2d3748] font-semibold tracking-tight">
              Batch Record Electrónico
            </span>
          </div>

          {/* Chip / Badge translúcido del usuario actual (Nombre, Rol) */}
          <motion.div
            whileHover={{ scale: 1.01 }}
            transition={appleSpring}
            style={{
              background: 'rgba(255, 255, 255, 0.68)',
              backdropFilter: 'blur(25px) saturate(180%)',
              WebkitBackdropFilter: 'blur(25px) saturate(180%)',
              border: '1px solid rgba(255, 255, 255, 0.4)',
              boxShadow: '0 8px 24px rgba(0, 0, 0, 0.05)',
            }}
            className="flex items-center gap-3 pl-2 pr-4 py-1.5 rounded-full"
          >
            <div className="w-8 h-8 rounded-full bg-gradient-to-br from-[#2d3748] to-[#666F88] text-white text-xs font-bold flex items-center justify-center shadow-sm">
              {userName.charAt(0).toUpperCase()}
            </div>
            <div className="text-left leading-tight">
              <div className="text-xs font-bold text-[#2d3748]">{userName}</div>
              <div className="text-[10px] font-semibold text-[#666F88]">
                Rol: {userRole}
              </div>
            </div>
          </motion.div>
        </header>

        {/* Área de Contenido con Transición Spring entre Pestañas */}
        <main className="flex-1 p-8 max-w-7xl w-full mx-auto space-y-6">
          <AnimatePresence mode="wait">
            <motion.div
              key={activeTab}
              initial={{ opacity: 0, y: 14, scale: 0.99 }}
              animate={{ opacity: 1, y: 0, scale: 1 }}
              exit={{ opacity: 0, y: -10, scale: 0.99 }}
              transition={appleSpring}
              className="space-y-6"
            >
              {/* =============================================================== */}
              {/* SECCIÓN PRINCIPAL DE BIENVENIDA (HERO CARD DE CRISTAL)          */}
              {/* =============================================================== */}
              <motion.section
                whileHover={{
                  scale: 1.01,
                  boxShadow: '0 24px 48px rgba(0, 0, 0, 0.09)',
                }}
                transition={appleSpring}
                style={glassStyles.heroCard}
                className="relative overflow-hidden p-8 md:p-10"
              >
                {/* Esferas sutiles de luz ambiental dentro del Hero Card */}
                <div
                  className="pointer-events-none absolute -top-24 -right-16 w-80 h-80 rounded-full"
                  style={{
                    background:
                      'radial-gradient(circle, rgba(243, 232, 237, 0.90) 0%, rgba(243, 232, 237, 0) 70%)',
                  }}
                />
                <div
                  className="pointer-events-none absolute -bottom-28 right-1/4 w-72 h-72 rounded-full"
                  style={{
                    background:
                      'radial-gradient(circle, rgba(102, 111, 136, 0.16) 0%, rgba(102, 111, 136, 0) 70%)',
                  }}
                />

                <div className="relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                  <div className="lg:col-span-8 space-y-4">
                    {/* Pill BPF / GMP */}
                    <div
                      className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold text-[#2d3748]"
                      style={{
                        background: 'rgba(243, 232, 237, 0.78)',
                        border: '1px solid rgba(255, 255, 255, 0.6)',
                      }}
                    >
                      <SFSymbols.CheckmarkShield />
                      <span>Cumplimiento Normativo BPF / GMP · NOM-059-SSA1</span>
                    </div>

                    {/* Título en tipografía estilo SF Pro Display limpia y destacada */}
                    <h1 className="text-3xl md:text-4xl font-bold tracking-[-0.03em] text-[#1d1d1f] leading-[1.12]">
                      Bienvenido(a),{' '}
                      <span className="text-[#2d3748]">{userName}</span>
                    </h1>

                    {/* Subtítulo / Propósito de la Plataforma */}
                    <p className="text-[15.5px] text-[#4a5568] leading-relaxed max-w-2xl font-normal">
                      Sistema de Gestión y Control Digital de Batch Records. Registra,
                      valida y asegura la trazabilidad e integridad de datos en cada lote
                      de fabricación en cumplimiento con las normas BPF / GMP.
                    </p>

                    {/* Acciones Principales (Alto Impacto + Secundario en Cristal Translúcido) */}
                    <div className="pt-2 flex flex-wrap items-center gap-3.5">
                      <motion.button
                        whileHover={{ scale: 1.02, y: -1 }}
                        whileTap={{ scale: 0.98 }}
                        transition={appleSpring}
                        onClick={onCreateNewBatch}
                        style={glassStyles.primaryButton}
                        className="inline-flex items-center gap-2.5 px-6 py-3.5 text-sm font-semibold text-white tracking-tight"
                      >
                        <SFSymbols.PlusCircle />
                        <span>+ Crear Nuevo Batch Record</span>
                      </motion.button>

                      <motion.button
                        whileHover={{ scale: 1.02, y: -1 }}
                        whileTap={{ scale: 0.98 }}
                        transition={appleSpring}
                        onClick={() => {
                          setActiveTab('bd');
                          if (onSearchExistingBatch) onSearchExistingBatch();
                        }}
                        style={glassStyles.secondaryGlassButton}
                        className="inline-flex items-center gap-2.5 px-6 py-3.5 text-sm font-semibold text-[#2d3748] tracking-tight"
                      >
                        <SFSymbols.MagnifyingGlass />
                        <span>Buscar Lote Existente</span>
                      </motion.button>
                    </div>
                  </div>

                  {/* Tarjeta lateral de Estado Operativo / Lote en Curso */}
                  <div className="lg:col-span-4">
                    <motion.div
                      whileHover={{ scale: 1.01 }}
                      transition={appleSpring}
                      style={glassStyles.accentPanel}
                      className="p-5 space-y-3.5"
                    >
                      <div className="flex items-center justify-between">
                        <span className="text-[11px] font-bold uppercase tracking-wider text-[#666F88]">
                          Lote Activo en Planta
                        </span>
                        <span className="px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#2d3748] text-white">
                          Lote {activeBatch.lote}
                        </span>
                      </div>

                      <div>
                        <div className="text-sm font-bold text-[#2d3748]">
                          {activeBatch.producto}
                        </div>
                        <div className="text-xs text-[#666F88] mt-0.5">
                          {activeBatch.etapa}
                        </div>
                      </div>

                      {/* Barra de Progreso Fluida */}
                      <div className="space-y-1.5">
                        <div className="flex justify-between text-xs font-semibold">
                          <span className="text-[#666F88]">Avance de Fabricación</span>
                          <span className="text-[#2d3748]">{activeBatch.progreso}%</span>
                        </div>
                        <div className="h-2.5 w-full rounded-full bg-[#2d3748]/10 overflow-hidden p-0.5">
                          <motion.div
                            initial={{ width: '0%' }}
                            animate={{ width: `${activeBatch.progreso}%` }}
                            transition={{ duration: 1.1, ease: [0.42, 0, 0.58, 1] }}
                            className="h-full rounded-full bg-gradient-to-r from-[#2d3748] via-[#666F88] to-[#8990a2]"
                          />
                        </div>
                      </div>

                      <div className="pt-1 flex items-center justify-between text-[11px] text-[#666F88] border-t border-white/50">
                        <span>Formato FGEN.018-1 V00</span>
                        <span className="font-semibold text-[#2d3748]">14 Páginas</span>
                      </div>
                    </motion.div>
                  </div>
                </div>
              </motion.section>

              {/* =============================================================== */}
              {/* TARJETAS DE RESUMEN RÁPIDO (GLASS CARDS CON HOVER SCALE 1.01)   */}
              {/* =============================================================== */}
              <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                {[
                  {
                    title: 'Total de Lotes',
                    value: metrics.total,
                    subtitle: 'Expedientes en SQL Server',
                    style: glassStyles.panel,
                  },
                  {
                    title: 'En Fabricación',
                    value: metrics.enProceso,
                    subtitle: 'Captura activa en línea',
                    style: glassStyles.accentPanel,
                  },
                  {
                    title: 'En Verificación',
                    value: metrics.verificacion,
                    subtitle: 'Revisión de Calidad BPF',
                    style: glassStyles.panel,
                  },
                  {
                    title: 'Lotes Liberados',
                    value: metrics.finalizados,
                    subtitle: 'Expediente 14 págs. completo',
                    style: glassStyles.panel,
                  },
                ].map((card, idx) => (
                  <motion.div
                    key={idx}
                    whileHover={{
                      scale: 1.01,
                      y: -2,
                      boxShadow: '0 24px 48px rgba(0, 0, 0, 0.09)',
                    }}
                    whileTap={{ scale: 0.98 }}
                    transition={appleSpring}
                    style={card.style}
                    className="p-6 flex flex-col justify-between cursor-pointer"
                  >
                    <span className="text-xs font-bold uppercase tracking-wider text-[#666F88]">
                      {card.title}
                    </span>
                    <div className="my-3 text-3xl font-bold tracking-tight text-[#2d3748]">
                      {card.value}
                    </div>
                    <span className="text-xs text-[#788199] font-medium">
                      {card.subtitle}
                    </span>
                  </motion.div>
                ))}
              </div>
            </motion.div>
          </AnimatePresence>
        </main>
      </div>
    </div>
  );
}
