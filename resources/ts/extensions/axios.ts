import axios, {
    AxiosError,
    AxiosInstance,
    AxiosResponse,
    InternalAxiosRequestConfig,
} from "axios";

function requestCallback(
    request: InternalAxiosRequestConfig
): InternalAxiosRequestConfig {
    return request;
}

function responseCallback(response: AxiosResponse): AxiosResponse {
    return response;
}

function errorCallback(error: AxiosError): unknown {
    throw error;
}

export enum ContentType {
    MULTIPART_FORM_DATA = "multipart/form-data",
    JSON = "application/json",
}

export enum XRequestedWith {
    XML_HTTP_REQUEST = "XMLHttpRequest",
}

export enum ResponseType {
    JSON = "json",
}

export type Handlers = {
    handleRequest?: typeof requestCallback;
    handleReponse?: typeof responseCallback;
    handleError?: typeof errorCallback;
};

export type ErrorResponseData = {
    message: string;
    errors?: { [key: string]: string };
};

export class AxiosConnection {
    public readonly axios: AxiosInstance;

    constructor({
        handleRequest = requestCallback,
        handleReponse = responseCallback,
        handleError = errorCallback,
    }: Handlers = {}) {
        this.axios = axios.create();
        const { request, response } = this.axios.interceptors;
        request.use(handleRequest);
        response.use(handleReponse, handleError);
    }
}
